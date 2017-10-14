<?php
  $file=file_get_contents( "http://creativeuniverse.tokyo/blog/index.php/feed/");
  $xml=preg_replace( '/&(?=[a-z_0-9]+=)/m', '&amp;',$file);
  $rss=simplexml_load_string($xml);
  $i=0 ;
  $rssData=array();
  foreach ($rss -> channel -> item as $item) {
    if( $i++ == 4 ) break;
    $tempData = array();
    $tempData['link'] = $item->link;
    $tempData['title'] = $item->title;
    $tempData['date'] = date('Y/m/d', strtotime($item->pubDate));
    $rssData[] = $tempData;
  }
?>
<table>
  <?php foreach ($rssData as $rss) : ?>
    <tr>
      <td class="date" style="padding-right: 10px;">
        <?php echo $rss[ 'date']; ?>
      </td>
      <td class="blogArticle">
        <a href="<?php echo $rss['link']; ?>">
          <?php echo $rss['title']; ?>
        </a>
      </td>
    </tr>
  <?php endforeach;?>
</table>
