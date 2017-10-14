
<script>
  var page = 1;
  var on_process = false;
  var page_max = 0;

  $(function(){
    getLimit().done(function(res){
      limitSet(res);
      console.log('Total pages : ' + res);
    }).fail(function(e){
      alert('失敗');
    });

  });

  function getLimit(){
    return $.ajax({
      type: 'post',
      dataType: 'text',
      url: 'php/page_limit.php',
      data: { keyword:<?php if(isset($_POST["keyword"])) echo "'".$_POST["keyword"]."'"; else echo "''";?>,
              category: <?php if(isset($_REQUEST["category"])) echo "'".$_REQUEST["category"]."'"; else echo "''";?>}
    });
  }

  function limitSet(limit){

    page_max = limit;

    getData(page).done(function(res){
      editHTML(res);
    }).fail(function(res){
      alert('失敗');
    });

  }

  function editHTML(res){
    $('#pager_loader').fadeOut('fast');
    if(res!=''){
      $('#contents').html(res);
      on_process = false;
      $(".article").css("width", ($("#main").width()-180)/3 + "px");
      $(".article").css("height", $(".article").width()*9/16 +"px");
      $("#right").css("height", $("#main").height() + 90 + 'px');
    } else{
      if(page == 0){
        $('#contents').html('データはありません。');
      }
    }
  }

  function getData(page){
    var data = {
      page: page,
      limit: page_max,
      keyword: <?php if(isset($_POST["keyword"])) echo "'".$_POST["keyword"]."'"; else echo "''";?>,
      category: <?php if(isset($_REQUEST["category"])) echo "'".$_REQUEST["category"]."'"; else echo "''";?>
    };
    return $.ajax({
      type: 'POST',
      dataType: 'text',
      url: 'php/data.php',
      data: data
    });
  }

  $(window).scroll(function(){
    var total = $(document).height();
    var position = $(window).scrollTop() + $(window).height();

    if(position >= (total - 50)){
      if(page < page_max && !on_process){
        on_process = true;
        page += 1;
        console.log("Page : " + page + "Load Start");
        $('#pager_loader').fadeIn('fast');
        setTimeout(function(){
          getData(page).done(function(res){
            editHTML(res);
          }).fail(function(res){
            alert('失敗');
          });
        }, 1000);
      }
    }

  });
</script>
