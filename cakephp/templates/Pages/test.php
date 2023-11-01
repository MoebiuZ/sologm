<?php
//$this->disableAutoLayout();
?>
<!DOCTYPE html>
<html lang="en">

<head>

<script type="text/javascript" src="//code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

<?php echo $this->Html->css("summernote-lite.min.css"); ?>
<?php echo $this->Html->script("summernote-lite.min.js"); ?>

</head>

<p><?php echo date('Y-m-d H:i:s');  ?></p>
<p>Yupiiii</p>

<button id="edit" class="btn btn-primary" onclick="edit()" type="button">Edit</button>
<button id="save" class="btn btn-primary" onclick="save()" type="button">Save</button>
<div class="click2edit">Hello Summernote</div>

<script>
    var edit = function() {
        $('.click2edit').summernote({focus: true});
       

};



var save = function() {
  var markup = $('.click2edit').summernote();
  $('.click2edit').summernote('destroy');
};
</script>





</html>
