<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <style>
    td {
      padding-right: 80px;
    }

    .catalog {
      margin: 30px;
    }
  </style>
</head>
<body>
  <div class="catalog">
    <p>Создание директории:</p>
    <input type="text" id="folder-name">
    <input type="submit" value="Создать" onclick="createFolder()">
    <table>
      <th>
        <tr>
          <td><b>Каталог</b></td>
          <td><b>Размер</b></td>
          <td><b>Время последнего изменения</b></td>
          <td><b>Действия</b></td>
        </tr>
      </th>
      <?php 
      $parentDirectory = scandir(getcwd());

      $path = isset($_GET['path']) ? $_GET['path'] : __DIR__;
      $_SESSION['path'] = $path;

      if (is_dir($path)) {
        $dir = scandir($path);
        
        if($path !== 'C:\OSPanel\domains\file-manager') {
          echo '<tr> <td><a href="'.$_SERVER['PHP_SELF'].'?path=' . realpath($path . DIRECTORY_SEPARATOR ."..") . '">Назад</a></td> </tr>';
        }
        foreach ($dir as $item) {
          if($item == '.' or $item == '..') { continue; }
          echo '<tr>';
          if (is_dir($path . DIRECTORY_SEPARATOR . $item)) {
           echo '<td class="dir"><a  id='.$item.' href="'.$_SERVER['PHP_SELF'].'?path=' . realpath($path . DIRECTORY_SEPARATOR . $item) . '">' . $item . '</a></td>';
           echo "<td></td>";
           echo "<td>".date ("F d Y H:i:s.", filemtime($path . DIRECTORY_SEPARATOR . $item))."</td>";
           $folder = $path.DIRECTORY_SEPARATOR.$item;
           $downloadFolder = $path.DIRECTORY_SEPARATOR;
           $_SESSION['folder'] = json_encode($folder,JSON_UNESCAPED_SLASHES);
           $_SESSION['downloadFolder'] = json_encode($downloadFolder,JSON_UNESCAPED_SLASHES);
           echo '<td><button onclick=deleteFolder('.json_encode($folder,JSON_UNESCAPED_SLASHES).')>Удалить</button></td>';
         } else {
          echo '<td class="file">' . $item . '</td>';
          echo "<td>".filemtime($path . DIRECTORY_SEPARATOR . $item)."</td>";
          echo "<td>".date ("F d Y H:i:s.", filemtime($item))."</td>";
        }
        echo '</tr>';
      }
    }else {
      echo 'Нет такого пути';
    }
    ?>
  </table>
</div>
</body>
</html>