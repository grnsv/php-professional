<?php

class DB
{
  private $link;

  public function __construct($host, $user, $pass, $db_name)
  {
    $this->link = mysqli_connect($host, $user, $pass, $db_name);
  }

  public function __destruct()
  {
    mysqli_close($this->link);
  }

  public function getImage($imageId = null)
  {
    $imageId = mysqli_real_escape_string($this->link, $imageId) ?? null;
    if ($imageId) {
      return mysqli_query(
        $this->link,
        'SELECT * FROM `db`.`images` WHERE `id` = ' . $imageId
      );
    } else {
      return mysqli_query(
        $this->link,
        'SELECT * FROM `db`.`images` ORDER BY `viewed` DESC'
      );
    }
  }

  public function incImageViewsCount($imageId)
  {
    $imageId = mysqli_real_escape_string($this->link, $imageId) ?? null;
    return mysqli_query(
      $this->link,
      'UPDATE `db`.`images` SET `viewed` = `viewed`+1 WHERE `id` = ' . $imageId
    );
  }
}
