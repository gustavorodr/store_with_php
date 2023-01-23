<?php
    require_once 'header.php';
    $pdo = conect::getInstance();
?>
<html>
    <body>
        <div class="container">
            <h1>CD's Store</h1>
            <br>
            <br>
            <div class="col-sm-12">
                <table class="table">
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            NAME
                        </th>
                        <th>
                            ARTIST
                        </th>
                        <th>
                            EDIT
                        </th>
                    </tr>
                    <?php
                        $sql = ('SELECT p_id, p_name, p_author FROM products');
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute();

                        $products = $stmt->fechAll(PDO::FETCH_ASSOC);

                        foreach ($products as $value) {
                            echo "<tr>";
                            echo '<td>' . $value['p_id'] . '</td>';
                            echo '<td>' . $value['p_name'] . '</td>';
                            echo '<td>' . $value['p_author'] . '</td>';
                            echo '<td><a href="edit.php?id=' . $value['p_id'] . '">Edit</a><td>';
                            echo "</tr>";
                        }
                    ?>
                </table>

            </div>

        </div>
    </body>
</html>