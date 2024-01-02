$(function(){
 
    var textblocks_open = 0;
    window.onbeforeunload = function(){
        if (textblocks_open > 0) {
           return textblocks_open;            
        }
    };


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken // this is defined in app.php as a js variable
        }
    });

    function confirmModal(message, callback) {
        var confirmIndex = true;
    
        var newMessage = message.replace(/(?:\r\n|\r|\n)/g, "<br>");
        $('#modal_confirm_dialog_body').html("" + newMessage + "");
        $('#modal_confirm_dialog').modal('show');
    
        $('#confirm_cancle').on("click", function() {
            if(confirmIndex) {
                callback(false);
                $('#modal_confirm_dialog').modal('hide');
                confirmIndex = false;
            }
        });
    
        $('#confirm_ok').on("click", function() {
            if(confirmIndex) {
                callback(true);
                $('#modal_confirm_dialog').modal('hide');
                confirmIndex = false;
            }
        });
    }

    // ------ Edit block on double click ------ //
    $("#blocks").on("dblclick", "[id^=block]", function() {
        textblocks_open += 1;
        var id = $(this).attr("id").replace("block-", '');
        $('#block-'.concat(id)).summernote({
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                ['fontsize', ['fontsize']],
                ['color', ['forecolor', 'color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
            ],
             height: 210,
             spellCheck: false,
             focus: true
        });

        $('#save-'.concat(id)).show();
        $('#cancel-'.concat(id)).show();
        $('#edit-'.concat(id)).hide();
        $('#delete-'.concat(id)).hide();
    });

    // ------ Edit block button ------ //
    $("#blocks").on("click", ".editblock", function() {
        textblocks_open += 1;
        var id = $(this).attr("id").replace("edit-", '');
        $('#block-'.concat(id)).summernote({
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                ['fontsize', ['fontsize']],
                ['color', ['forecolor', 'color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
            ],
             height: 210,
             spellCheck: false,
             focus: true
        });
        $('#save-'.concat(id)).show();
        $('#cancel-'.concat(id)).show();
        $('#edit-'.concat(id)).hide();
        $('#delete-'.concat(id)).hide();
    });

    // ------ Save block ------ //
    $("#blocks").on("click", ".saveblock", function() {
        var id = $(this).attr("id").replace("save-", '');
        var markup = $('#block-'.concat(id)).summernote('code');
        var postdata = {"id": id, "content": markup};
        $.ajax({
            url: "/blocks/edit",
            data: postdata,
            dataType: "json",
            method: "post",
            type: "post",
            success: function(response) {
                if (response.status == "success") {
                    textblocks_open -= 1;
                    $('#block-'.concat(id)).summernote('destroy');
                    $('#edit-'.concat(id)).show();
                    $('#delete-'.concat(id)).show();
                    $('#save-'.concat(id)).hide();
                    $('#cancel-'.concat(id)).hide();
                } else {
                    alert("Error");
                }               
            },
            error: function(e) {
                console.log(e);
            }
        });
    });


    // ------ Delete block ------ //
    $("#blocks").on("click", ".deleteblock", function() {
        var id = $(this).attr("id").replace("delete-", '');
        confirmModal('Are you sure you want to delete this block?', function() {
            var postdata = {"id": id,};
            $.ajax({
                url: "/blocks/delete",
                data: postdata,
                dataType: "json",
                method: "post",
                type: "post",
                success: function(response) {
                    if (response.status == "success") {
                        $('#soloblock-'.concat(id)).remove();
                    } else {
                        alert("Error");
                    }               
                },
                error: function(e) {
                    console.log(e);
                }
            });
        });
    });
      

    // ------ Calcel block ------ //
    $("#blocks").on("click", ".cancelblock", function() {
        textblocks_open -= 1;
        var id = $(this).attr("id").replace("cancel-", '');
        $('#block-'.concat(id)).summernote('destroy');
        $('#edit-'.concat(id)).show();
        $('#delete-'.concat(id)).show();
        $('#save-'.concat(id)).hide();
        $('#cancel-'.concat(id)).hide();
    });

    // ------ Save new block ------ //
    $(".savenew").click(function() {
        var scene_id = $(this).attr("id").replace("save-new-", '');
        var markup = $('#block-new').summernote('code');
        var postdata = {"scene_id": scene_id, "content": markup, "blocktype": "text"};
        
        if (markup != "<p><br></p>") {
            $.ajax({
                url: "/blocks/add",
                data: postdata,
                dataType: "json",
                method: "post",
                type: "post",
                success: function(response) {
                    if (response.status == "success") {
                        textblocks_open -= 1;
                        let newblock = '<div id="soloblock-' + response.block_id + '">' +
                            '<i class="fas fa-file-lines bg-maroon"></i>' +
                            '<div class="pblock timeline-item pb-2">' +
                            '<div class="float-left">' +
                            '<button id="edit-' + response.block_id + '" class="editblock btn btn-xs hidden" type="button"><i class="fas fa-pencil"></i></button>' +
                            '<button id="delete-' + response.block_id + '" class="deleteblock btn btn-xs hidden text-danger" type="button"><i class="fas fa-trash"></i></button>' +
                            '</div><br /><div id="block-' + response.block_id + '" class="pblocktext">' + markup +
                            '</div><div class="float-right">' +
                            '<button id="cancel-' + response.block_id + '" class="cancelblock btn btn btn-secondary hidden clearfix my-2" type="button">Cancel</button>' +
                            '<button id="save-' + response.block_id + '" class="saveblock btn btn btn-primary hidden clearfix my-2" type="button"><i class="fas fa-save"></i> Save</button>' +
                            '</div></div></div>'
                        
                        $('#blocks').append(newblock); 
                        $("#newpblock").show();
                        $("#block-new").summernote('reset');
                        $("#block-new").summernote('destroy');
                        $('#new-block-editor').hide();
                    } else {
                        alert("Error");
                    }               
                },
                error: function(e) {
                    console.log(e);
                }
            });
        } else {
            textblocks_open -= 1;
            $("#newpblock").show();
            $("#block-new").summernote('reset');
            $("#block-new").summernote('destroy');
            $('#new-block-editor').hide();
        }
    });

    // ------ Cancel new block ------ //
    $('.cancelnew').click(function() {
        textblocks_open -= 1;
        $("#newpblock").show();
        $("#block-new").summernote('reset');
        $("#block-new").summernote('destroy');
        $('#new-block-editor').hide();
    });
        
    // ------ Create new block ------ //
    $("#newpblock").click(function() {
        textblocks_open += 1;
        $("#block-new").summernote({
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                ['fontsize', ['fontsize']],
                ['color', ['forecolor', 'color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
            ],
             height: 210,
             spellCheck: false,
             focus: true
        });
        $("#new-block-editor").show();
        $(this).hide();
        $("html, body").animate({ scrollTop: $(document).height() }, 10);
    });


    // ------ Fate roll block ------ //
    $("#fateroll").click(function() {
        let data = $("#fateform").serializeArray();
        inputs = {};
        $(data).each(function(i, field) {
            inputs[field.name] = field.value;
          });

        let postdata = {"scene_id": inputs['scene_id'], "odds": inputs['odds'], "question": inputs['question'], "blocktype": "fate"};
        $.ajax({
            url: "/blocks/fateroll",
            data: postdata,
            dataType: "json",
            method: "post",
            type: "post",
            success: function(response) {
                if (response.status == "success") {
                    
                    let newblock = '<div id="soloblock-' + response.block_id + '">' +
                            '<i class="fas fa-clover bg-green"></i>' +
                            '<div class="pblock timeline-item pb-2">' +
                            '<div class="float-left">' +
                            '<button id="delete-' + response.block_id + '" class="deleteblock btn btn-xs hidden text-danger" type="button"><i class="fas fa-trash"></i></button>' +
                            '</div><br /><div id="block-' + response.block_id + '" class="pblocktext">' + 
                            '<div>' + inputs['question'] + '</div>' +
                            '<div>' + response.fate + '</div>' +
                            '</div>' +
                            '</div></div></div>'
                    
                    $('#blocks').append(newblock); 
                    $('#fateform').trigger('reset');
                    $('#fatemodal').modal('toggle');
                    $("html, body").animate({ scrollTop: $(document).height() }, 10);
                    
                } else {
                    alert("Error");
                    console.log("Error");
                }               
            },
            error: function(e) {
                console.log(e);
            }
        });
        
    });

   

    // ------ Edit campaign name ------ //
    $("[id^=campaign-id]").dblclick(function(e) {
        textblocks_open += 1;
        
        var id = $(this).attr("id").replace("campaign-id-", '');
        $("#campaign-name").attr('contenteditable','true');
        $("#campaign-name").focus();

        $('.btn-editcampaignname').hide();

    });

    $("#campaign-name").blur(function(e) {
        textblocks_open -= 1;
        $("#campaign-name").attr('contenteditable','false');
        // Acción a ejecutar después de guardar los cambios
    });

    $("#campaign-name").keydown(function(e) {
        if (e.keyCode === 13) {
            textblocks_open -= 1;
            $("#campaign-name").attr('contenteditable','false');
            // Acción a ejecutar después de guardar los cambios
        }
    });

    // ------ Edit scene name ------ //
    $("[id^=scene-id]").dblclick(function(e) {
        textblocks_open += 1;
        
        var id = $(this).attr("id").replace("scene-id-", '');
        $("#scene-name").attr('contenteditable','true');
        $("#scene-name").focus();

        $('.btn-editscenename').hide();
        

    });

    $("#scene-name").blur(function(e) {
        textblocks_open -= 1;
        $("#scene-name").attr('contenteditable','false');
       
        // Acción a ejecutar después de guardar los cambios
    });

    $("#scene-name").keydown(function(e) {
        if (e.keyCode === 13) {
            textblocks_open -= 1;
            $("#scene-name").attr('contenteditable','false');
            // Acción a ejecutar después de guardar los cambios
        }
    });


});



$(function(){
    const rows = 21;
    const cols = 21;
    let grid = createGrid();

    var conwaysize = $('#conway-grid').attr("class").replace(/.*conway-(\S*)[ ]*.*/i, '$1');
    let container = $('#conway-grid-inside');
    
    if (conwaysize == "mini") {
        container = $('#conway-grid');
    }
    

    function createGridRows() {
        for (let i = 0; i < rows; i++) {
            const row = $('<div id="cwrow' + i + '" class="row"></div>');
            for (let j = 0; j < cols; j++) {
                const cell = $('<div id="cwcell' + j + '" class="conwaycell-' + conwaysize + '"></div>');
                cell.on('click', () => toggleCell(i, j));
                row.append(cell);
            }
            container.append(row)
        }
    }

    function createGrid() {
        const newGrid = new Array(rows).fill(null)
        .map(() => new Array(cols).fill(false));
        return newGrid;
    }
        
    function renderGrid() {
        for (let i = 0; i < rows; i++) {
            for (let j = 0; j < cols; j++) {
                const cell = $('#cwrow' + i).find('#cwcell' + j);
                if (grid[i][j] == 1) {
                   cell.removeClass('conwayalive-' + conwaysize);
                   cell.width();
                   cell.addClass('conwayalive-' + conwaysize);
                }
            }
        }
    }

    function toggleCell(row, col) {
        grid[row][col] = !grid[row][col];
        renderGrid();
    }
    
    function updateGrid() {
        const newGrid = createGrid();
    
        for (let i = 0; i < rows; i++) {
            for (let j = 0; j < cols; j++) {
                const neighbors = countNeighbors(i, j);
                if (grid[i][j]) {
                    newGrid[i][j] = neighbors === 2 || neighbors === 3;
                } else {
                    newGrid[i][j] = neighbors === 3;
                }
            }
        }
    
        grid = newGrid;
        renderGrid();
    }
    
    function countNeighbors(row, col) {
        let count = 0;
    
        for (let i = -1; i <= 1; i++) {
            for (let j = -1; j <= 1; j++) {
                const newRow = row + i;
                const newCol = col + j;
    
                if (newRow >= 0 && newRow < rows && newCol >= 0 && newCol < cols) {
                    count += grid[newRow][newCol] ? 1 : 0;
                }
            }
        }
    
        count -= grid[row][col] ? 1 : 0;
        return count;
    }
    
    createGridRows();

    toggleCell(10,5);
    toggleCell(10,6);
    toggleCell(10,7);
    toggleCell(10,8);
    toggleCell(10,9);
    toggleCell(10,10);
    toggleCell(10,11);
    toggleCell(10,12);
    toggleCell(10,13);
    toggleCell(10,14);
    toggleCell(10,15);

    toggleCell(8,10);
    toggleCell(9,10);

    toggleCell(11,10);
    toggleCell(12,10);

    renderGrid();
    setInterval(updateGrid, 1000);
    
});
