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
        let confirmIndex = true;
    
        let newMessage = message.replace(/(?:\r\n|\r|\n)/g, "<br>");
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

    
    // ------ Edit text block ------ //
    function edit_textblock() {
                
        let id = "";
        if ($(this).hasClass('editblock')) {
            id = $(this).attr("id").replace("edit-", '');
        } else {
            id = $(this).attr("id").replace("block-", '');
        }

        if ($(this).hasClass('pblocktext')) {

            textblocks_open += 1;
            
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
        }
    }
    

    $("#blocks").on("dblclick", "[id^=block]", edit_textblock);
    $("#blocks").on("click", ".editblock", edit_textblock);

    // ------ Save block ------ //
    $("#blocks").on("click", ".saveblock", function() {
        let id = $(this).attr("id").replace("save-", '');
        let markup = $('#block-'.concat(id)).summernote('code');
        let postdata = {"id": id, "content": markup};
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
        let id = $(this).attr("id").replace("delete-", '');
        confirmModal('Are you sure you want to delete this block?', function() {
            let postdata = {"id": id,};
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
      

    // ------ Cancel block ------ //
    $("#blocks").on("click", ".cancelblock", function() {
        textblocks_open -= 1;
        let id = $(this).attr("id").replace("cancel-", '');
        $('#block-'.concat(id)).summernote('destroy');
        $('#edit-'.concat(id)).show();
        $('#delete-'.concat(id)).show();
        $('#save-'.concat(id)).hide();
        $('#cancel-'.concat(id)).hide();
    });

    // ------ Save new block ------ //
    $(".savenew").click(function() {
        let scene_id = $(this).attr("id").replace("save-new-", '');
        let markup = $('#block-new').summernote('code');
        let postdata = {"scene_id": scene_id, "content": markup, "blocktype": "text"};
        
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
                            '</div><div class="ml-2">' +
                            '<button id="cancel-' + response.block_id + '" class="cancelblock btn btn btn-secondary hidden clearfix my-2" type="button">Cancel</button>' +
                            '<button id="save-' + response.block_id + '" class="saveblock btn btn btn-primary hidden clearfix my-2" type="button"><i class="fas fa-save"></i> Save</button>' +
                            '</div></div></div>'
                        
                        $("#newpblock").show();
                        $("#block-new").summernote('reset');
                        $("#block-new").summernote('destroy');
                        $('#new-block-editor').hide();
                        $('#blocks').append(newblock); 
                        $('#soloblock-' + response.block_id).hide().fadeIn(1000);
                    
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

        if (inputs['question'] == "") {
            return;
        }
        let postdata = {"scene_id": inputs['scene_id'], "odds": inputs['odds'], "question": inputs['question'], "blocktype": "fate"};
        $.ajax({
            url: "/blocks/fateroll",
            data: postdata,
            dataType: "json",
            method: "post",
            type: "post",
            success: function(response) {
                if (response.status == "success") {
                    
                    let newblock = '<div id="soloblock-' + response.block_id + '" class="fade show">' +
                            '<i class="fas fa-question bg-orange"></i>' +
                            '<div class="pblock timeline-item pb-2">' +
                            '<div class="float-left">' +
                            '<button id="delete-' + response.block_id + '" class="deleteblock btn btn-xs hidden text-danger" type="button"><i class="fas fa-trash"></i></button>' +
                            '</div><br /><div id="block-' + response.block_id + '" class="otherblock">' + 
                            '<div>' + inputs['question'] + '</div>' +
                            '<div>';

                            switch(inputs['odds']) {
                                case '0': newblock += 'Certain'; break;
                                case '1': newblock += 'Nearly Certain'; break; 
                                case '2': newblock += 'Very Likely'; break;
                                case '3': newblock += 'Likely'; break;
                                case '4': newblock += '50/50'; break;
                                case '5': newblock += 'Unlikely'; break;
                                case '6': newblock += 'Very Unlikely'; break;
                                case '7': newblock += 'Nearly Impossible'; break;
                                case '8': newblock += 'Impossible'; break;
                              };

                    newblock += '</div><div><h3>' + response.answer + '</h3></div>';
                    
                    if (response.random_event == true){
                        newblock += '<div><strong>Random event!</strong></div>';
                    }
                    newblock += '</div>' +
                                '</div></div></div>'
                                        
                    $('#fateform').trigger('reset');
                    $('#fatemodal').modal('toggle');
                    $("html, body").animate({ scrollTop: $(document).height() }, 10);
                    $('#blocks').append(newblock);
                    $('#soloblock-' + response.block_id).hide().fadeIn(1000);
                    
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


    // ------ Random event block ------ //
    $("[id^=randomevent]").click(function() {
        let scene_id = $(this).attr("id").replace("randomevent-", '');
        
        let postdata = {"scene_id": scene_id, "blocktype": "randomevent"};
        $.ajax({
            url: "/blocks/randomevent",
            data: postdata,
            dataType: "json",
            method: "post",
            type: "post",
            success: function(response) {
                if (response.status == "success") {
                    let newblock = '<div id="soloblock-' + response.block_id + '" class="fade show">' +
                            '<i class="fas fa-dice bg-green"></i>' +
                            '<div class="pblock timeline-item pb-2">' +
                            '<div class="float-left">' +
                            '<button id="delete-' + response.block_id + '" class="deleteblock btn btn-xs hidden text-danger" type="button"><i class="fas fa-trash"></i></button>' +
                            '</div><br /><div id="block-' + response.block_id + '" class="otherblock">' + 
                            '<div>A random event ocurred with the following Focus:</div><div>' +
                            '</div><div><h3>' + response.eventfocus + '</h3></div>' +
                            '</div></div></div></div>'
                                        
                    $("html, body").animate({ scrollTop: $(document).height() }, 10);
                    $('#blocks').append(newblock);
                    $('#soloblock-' + response.block_id).hide().fadeIn(1000);
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


    // ------ Event meaning block ------ //
    $("[id^=eventmeaning]").click(function() {
        const regex = /-[0-9]*/i;
        let meaning_type = $(this).attr("id").replace("eventmeaning-", '').replace(regex, '');
        let scene_id = $(this).attr("id").replace("eventmeaning-" + meaning_type + '-', '');

                
        let postdata = {"scene_id": scene_id, "blocktype": "eventmeaning", "meaning_type": meaning_type };
        $.ajax({
            url: "/blocks/eventmeaning",
            data: postdata,
            dataType: "json",
            method: "post",
            type: "post",
            success: function(response) {
                if (response.status == "success") {
                    let newblock = '<div id="soloblock-' + response.block_id + '" class="fade show">' +
                            '<i class="fas fa-brain bg-blue"></i>' +
                            '<div class="pblock timeline-item pb-2">' +
                            '<div class="float-left">' +
                            '<button id="delete-' + response.block_id + '" class="deleteblock btn btn-xs hidden text-danger" type="button"><i class="fas fa-trash"></i></button>' +
                            '</div><br /><div id="block-' + response.block_id + '" class="otherblock">' + 
                            '<div>' + meaning_type.charAt(0).toUpperCase() + meaning_type.slice(1) + ' Meaning:</div><div>' +
                            '</div><div><h3>' + response.eventmeaning_first + " & " + response.eventmeaning_second + '</h3></div>' +
                            '</div></div></div></div>'
                                        
                    $("html, body").animate({ scrollTop: $(document).height() }, 10);
                    $('#blocks').append(newblock);
                    $('#soloblock-' + response.block_id).hide().fadeIn(1000);
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

    
     // ------ Adventure list functions ------ //
    function adventurelist_add(list) {
        let list_type = "";
        
        if ($(this).attr('id') == 'newthread' || list == 'threads') {
            list_type = "threads";
        } else if ($(this).attr('id') == 'newcharacter' || list == 'characters') {
            list_type = "characters";
        }
        
        let data = $("#" + list_type + "form").serializeArray();
        inputs = {};
        $(data).each(function(i, field) {
            inputs[field.name] = field.value;
          });

        if (inputs['content'] == "") {
            return;
        }

        let postdata = {"campaign_id": inputs['campaign_id'], "list_type": list_type, "content": inputs['content']};
        $.ajax({
            url: "/listitems/add",
            data: postdata,
            dataType: "json",
            method: "post",
            type: "post",
            success: function(response) {
                if (response.status == "success") {
                    
                    let newitem = '<tr id="' + list_type + '-' + response.listitem_id + '">' +
                                  ' <td style="word-wrap: break-word;min-width: 170px;max-width: 170px;">' + inputs['content'] + '</td>' +
                                  '<td style="width: 50px"><button id="delete-' + response.listitem_id + '" class="deletelistitem btn hidden btn-xs text-danger" type="button"><i class="fas fa-trash"></i></button></td>' +
                                  '</tr>';
                                        
                    $('#' + list_type + 'form').trigger('reset');
                    $('#' + list_type + "table").append(newitem);
                    $('#' + list_type + '-' + response.listitem_id).hide().fadeIn(1000);
                    
                } else {
                    alert("Error");
                    console.log("Error");
                }               
            },
            error: function(e) {
                console.log(e);
            }
        });
        
    }

    // ------ Delete adventurelist item ------ //
    function adventurelist_delete() {
        let list_type = "";
        if ($(this).closest('tr').attr('id').match('^threads')) {
            list_type = "threads";
        } else {
            list_type = "characters";
        }

        let id = $(this).attr("id").replace("delete-", '');
        confirmModal('Are you sure you want to delete this item?', function() {
            let postdata = {"id": id};
            $.ajax({
                url: "/listitems/delete",
                data: postdata,
                dataType: "json",
                method: "post",
                type: "post",
                success: function(response) {
                    if (response.status == "success") {
                        $('#' + list_type + '-'.concat(id)).remove();
                    } else {
                        alert("Error");
                    }               
                },
                error: function(e) {
                    console.log(e);
                }
            });
        });
    }

    $("#newthread").click(adventurelist_add);
    $("#newcharacter").click(adventurelist_add);
    $("#threadstable").on("click", ".deletelistitem", adventurelist_delete);
    $("#characterstable").on("click", ".deletelistitem", adventurelist_delete);

    $("#threadsform").keydown(function(e) {
        if (e.keyCode === 13) {
            e.preventDefault();
            e.stopPropagation();
            adventurelist_add("threads");
        }
    });

    $("#charactersform").keydown(function(e) {
        if (e.keyCode === 13) {
            e.preventDefault();
            e.stopPropagation();
            adventurelist_add("characters");
        }
    });



    // ------ Edit campaign name ------ //

    function edit_campaign(id, name) {
        let postdata = {"id": id, "name": name};
        $.ajax({
            url: "/campaigns/edit",
            data: postdata,
            dataType: "json",
            method: "post",
            type: "post",
            success: function(response) {
                if (response.status == "success") {
                    $("#campaign-name").attr('contenteditable','false');
                    $("#sidebar-campaign-" + id).text(name);
                    $('#campaign-name').blur(campaign_blur);
                    textblocks_open -= 1;
                } else {
                    alert("Error");
                }               
            },
            error: function(e) {
                console.log(e);
            }
        });
    }

    function campaign_blur() {
        textblocks_open -= 1;
        $(this).text($(this).data('oldname'));
    }


    $("[id^=campaign-id]").dblclick(function(e) {
        textblocks_open += 1;
        $("#campaign-name").attr('contenteditable','true');
        $('#campaign-name').data('oldname', $(this).text().trim());
        $("#campaign-name").focus();        
    });


    $("#campaign-name").blur(campaign_blur);

    $("#campaign-name").keydown(function(e) {
        if (e.keyCode === 13) {
            $('#campaign-name').off('blur');
            let id = $(this).parent().attr("id").replace("campaign-id-", '');
            let name = $(this).text().trim();
            $(this).text(name); // remove whitespaces on view
            $("#campaign-name").attr('contenteditable','false');
            edit_campaign(id, name);       
        }
    });


    // ------ Edit scene name ------ //
    
    function edit_scene(id, name) {
        let postdata = {"id": id, "name": name};
        $.ajax({
            url: "/scenes/edit",
            data: postdata,
            dataType: "json",
            method: "post",
            type: "post",
            success: function(response) {
                if (response.status == "success") {
                    $("#scene-name").attr('contenteditable','false');
                    $("#sidebar-scene-" + id).text(name);
                    $('#scene-name').blur(scene_blur);
                    textblocks_open -= 1;
                } else {
                    alert("Error");
                }               
            },
            error: function(e) {
                console.log(e);
            }
        });
    }

    function scene_blur() {
        textblocks_open -= 1;
        $(this).text($(this).data('oldname'));
    }
    
    $("[id^=scene-id]").dblclick(function(e) {
        textblocks_open += 1;
        $("#scene-name").attr('contenteditable','true');
        $('#scene-name').data('oldname', $(this).text().trim());
        $("#scene-name").focus();   
    });

    $("#scene-name").blur(scene_blur);


    $("#scene-name").keydown(function(e) {
        if (e.keyCode === 13) {
            $('#scene-name').off('blur');
            let id = $(this).parent().attr("id").replace("scene-id-", '');
            let name = $(this).text().trim();
            $(this).text(name); // remove whitespaces on view
            $("#scene-name").attr('contenteditable','false');
            edit_scene(id, name); 
        }
    });

});



$(function(){
    const rows = 21;
    const cols = 21;
    let grid = createGrid();

    let conwaysize = $('#conway-grid').attr("class").replace(/.*conway-(\S*)[ ]*.*/i, '$1');
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
