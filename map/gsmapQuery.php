<?php

Class DbQuery extends DbCon {

 public function getLocation() {

    $sql = 'SELECT shortname, lat, lng from COVID_VACCINATION_CENTER_DATA ORDER BY shortname';
    $stmt = $this->connect()->query($sql)
    while($row = $stmt->fetch()) {
        echo $row['shortname'] . '<br>'
        echo $row['lat'] . '<br>'
        echo $row['lng'] . '<br>'
    }


}
}
?>