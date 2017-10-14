
<script>
  var page = 1;
  var on_process = false;
  var page_max = 0;

  $(function(){
    getLimit().done(function(res){
      limitSet(res);
      console.log('Total pages : ' + res);
    }).fail(function(e){
      alert('ページ数取得失敗\nリロードしてください。');
    });

  });

  function getLimit(){
    return $.ajax({
      type: 'post',
      dataType: 'text',
      url: 'include/photo/page_limit.php'
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
      $('.content').html(res);
      on_process = false;
    } else{
      if(page == 0){
        $('.content').html('データはありません。');
      }
    }
  }

  function getData(page){
    var data = {
      page: page,
      limit: page_max
    };
    return $.ajax({
      type: 'POST',
      dataType: 'text',
      url: 'include/photo/data.php',
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
            alert('要求がタイムアウトしました。');
          });
        }, 1000);
      }
    }

  });
</script>
