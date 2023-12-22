$(function(){
     
  
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken // this is defined in app.php as a js variable
        }
    });

    $("#blocks").on("dblclick", "[id^=block]", function() {
        var id = $(this).attr("id").replace("block-", '');
        var btnAttch = function (context) {
            var ui = $.summernote.ui;
            var button = ui.button({
                contents:
                '<label class="custom-file-upload"> <input type="file" class="input-file" id="input-file-' + id + '" multiple/>' +
                '<i class="glyphicon glyphicon-paperclip"></i> dsfg </label>',
                 tooltip: 'Attach file',
             });
        }
        $('#block-'.concat(id)).summernote({
            toolbar: [
                ['style', ['bold', 'italic', 'underline']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['fontsize', ['fontsize']],
                ['btn-anexar', ['btnAnexar']],
                ['save', ['save']], // The button
            ],
            buttons: {
                btnAttch: btnAttch
            },
            save:{
                lang: 'en-US', // Change to your chosen language
                encode: false, // true = encode editor data, you may need to unencode the data on your backend or before output.
                pageBlockClass: '.page-block', // Leave empty if not using an overlay to block user activity while data is sent.
                pageBlockToggle: 'd-block', // Class to use to toggle Page Block. Remove the class via backend once data is safely stored.
                saveBtnIndicator: 'btn-danger', // Class to change save button indication when content changes to warn of unsaved data.
            },
            focus: true
        });

        $('#save-'.concat(id)).show();
        $('#edit-'.concat(id)).hide();
    });

    $("#blocks").on("click", ".editblock", function() {
        var id = $(this).attr("id").replace("edit-", '');
        var btnAttch = function (context) {
            var ui = $.summernote.ui;
            var button = ui.button({
                contents:
                '<label class="custom-file-upload"> <input type="file" class="input-file" id="input-file-' + id + '" multiple/>' +
                '<i class="glyphicon glyphicon-paperclip"></i> dsfg </label>',
                 tooltip: 'Attach file',
            });
        }
        $('#block-'.concat(id)).summernote({
            toolbar: [
                ['style', ['bold', 'italic', 'underline']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['fontsize', ['fontsize']],
                ['btn-anexar', ['btnAnexar']],
                ['save', ['save']], // The button
            ],
            buttons: {
                btnAttch: btnAttch
            },
            save:{
                lang: 'en-US', // Change to your chosen language
                encode: false, // true = encode editor data, you may need to unencode the data on your backend or before output.
                pageBlockClass: '.page-block', // Leave empty if not using an overlay to block user activity while data is sent.
                pageBlockToggle: 'd-block', // Class to use to toggle Page Block. Remove the class via backend once data is safely stored.
                saveBtnIndicator: 'btn-danger', // Class to change save button indication when content changes to warn of unsaved data.
            },
            focus: true
            });
        $('#save-'.concat(id)).show();
        $('#edit-'.concat(id)).hide();
    });
      
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
                    $('#block-'.concat(id)).summernote('destroy');
                    $('#edit-'.concat(id)).show();
                    $('#save-'.concat(id)).hide();
                } else {
                    alert("Error");
                }               
            },
            error: function(e) {
                console.log(e);
            }
        });
    });

    $(".savenew").click(function() {
        var scene_id = $(this).attr("id").replace("save-new-", '');
        var markup = $('#block-new').summernote('code');

        var postdata = {"scene_id": scene_id, "content": markup};
        console.log(markup);
        if (markup != "<p><br></p>") {
            $.ajax({
                url: "/blocks/add",
                data: postdata,
                dataType: "json",
                method: "post",
                type: "post",
                success: function(response) {
                    if (response.status == "success") {


                        let newblock = '<div class="row soloblock">' +
                            '<div class="col pblock">' +
                            '<div class="float-left">' +
                            '<button id="edit-' + 
                            response.block_id +
                            '" class="editblock btn btn-xs hidden" type="button"><i class="fas fa-pencil"></i></button>' +
                            '</div><br /><div id="block-' +
                            response.block_id +
                            '" class="pblocktext">' +
                                markup +
                            '</div><div class="float-right">' +
                            '<button id="save-' +
                            response.block_id +
                            '" class="saveblock btn btn btn-primary hidden float-right clearfix" type="button"><i class="fas fa-save"></i> Save</button>' +
                            '</div></div></div>'
                        
                        $('#blocks').append(newblock); 
                        $("#newpblock").show();
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
            $("#newpblock").show();
            $("#block-new").summernote('destroy');
            $('#new-block-editor').hide();
        }
    });
        
    $("#newpblock").click(function() {
        $("#block-new").summernote();
        $("#new-block-editor").show();
        $(this).hide();
        $("html, body").animate({ scrollTop: $(document).height() }, 10);
    });

    /*
    $("#newpblock").click(function() {
        $('.soloblock').last().after('<div class="row"><div class="col pblock"><div id="block-new"></div></div><br /><div class="float-right"><button id="save-new" class="editblock btn btn-xs btn-primary" type="button"><i class="fas fa-edit">Save</i></button>'); 

        //var id = $(this).attr("id").replace("block-", '');
        var btnAttch = function (context) {
            var ui = $.summernote.ui;
          /*  var button = ui.button({
                contents:
                '<label class="custom-file-upload"> <input type="file" class="input-file" id="input-file-' + id + '" multiple/>' +
                '<i class="glyphicon glyphicon-paperclip"></i> dsfg </label>',
                 tooltip: 'Attach file',
             });
        }
        $('#block-new').summernote({
            toolbar: [
                ['style', ['bold', 'italic', 'underline']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['fontsize', ['fontsize']],
                ['btn-anexar', ['btnAnexar']],
                ['save', ['save']], // The button
            ],
            save:{
                lang: 'en-US', // Change to your chosen language
                encode: false, // true = encode editor data, you may need to unencode the data on your backend or before output.
                pageBlockClass: '.page-block', // Leave empty if not using an overlay to block user activity while data is sent.
                pageBlockToggle: 'd-block', // Class to use to toggle Page Block. Remove the class via backend once data is safely stored.
                saveBtnIndicator: 'btn-danger', // Class to change save button indication when content changes to warn of unsaved data.
            },
            focus: true
        });

        $(this).hide();
    });*/



/*
    // Ajax csrf token setup


    // ajax request to save student
    $("#frm-add-student").on("submit", function(){

        var postdata = $("#frm-add-student").serialize();
        $.ajax({
            url: "/ajax-add-student",
            data: postdata,
            type: "JSON",
            method: "post",
            success:function(response){
                
                window.location.href = '/list-students'
            }
        });
    });

    // ajax request to update student
    $(document).on("submit", "#frm-edit-student", function(){

        var postdata = $("#frm-edit-student").serialize();

        $.ajax({
            url: "/ajax-edit-student",
            data: postdata,
            type: "JSON",
            method: "post",
            success:function(response){
                
                window.location.href = '/list-students'
            }
        });
    });

    // ajax request to delete student
    $(document).on("click", ".btn-delete-student", function(){

        if(confirm("Are you sure want to delete ?")){

            var postdata = "student_id=" + $(this).attr("data-id");
            $.ajax({
                url: "/ajax-delete-student",
                data: postdata,
                type: "JSON",
                method: "post",
                success:function(response){
                    
                    window.location.href = '/list-students'
                }
            });
        }
    });*/
});



$(function(){
    const rows = 21;
    const cols = 21;
    let grid = createGrid();
    
    const container = $('#conway-grid');

    function dale() {
        for (let i = 0; i < rows; i++) {
            const row = $('<div id="cwrow' + i + '" class="row"></div>');
    
            for (let j = 0; j < cols; j++) {
                const cell = $('<div id="cwcell' + j + '" class="conwaycell"></div>');
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
                   cell.removeClass('conwayalive');
                   cell.width();
                   cell.addClass('conwayalive');

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
    
    dale();

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
