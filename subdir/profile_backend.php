<?php

class profile_tab
{
    function postlist_creation($id)
    {
        include('include/connection.php');

        $sql = "SELECT * FROM posts WHERE user_id = '$id'";
        $res = mysqli_query($con, $sql);

        while ($row = mysqli_fetch_assoc($res)) {

            $content = $row['post'];
            if (strlen($content) > 125) {
                $content = substr($content, 0, 125);
            }
            $date = $row['date_time'];
            $pid = $row['id'];

            echo '
            <a href="view_post.php?id=' . $pid . '" style="text-decoration:none;">
                <div class="profile-tab-list">
                    <p>' . $content . '</p>
                    <p class="time-text">' . $date . '</p>
                </div>
            </a>';
        }
    }

    function restlist_creation($id)
    {
        include('include/connection.php');

        $sql = "SELECT * FROM restaurants WHERE owner_id = '$id'";
        $res = mysqli_query($con, $sql);

        while ($row = mysqli_fetch_assoc($res)) {

            $content = $row['name'];
            if (strlen($content) > 125) {
                $content = substr($content, 0, 125);
            }
            $details = $row['details'];
            if (strlen($details) > 125) {
                $details = substr($details, 0, 125);
            }
            $pid = $row['id'];

            echo '
            <a href="view_restaurant.php?id=' . $pid . '" style="text-decoration:none;">
                <div class="profile-tab-list">
                    <p>' . $content . '</p>
                    <p class="time-text" style="font-size:10px;">' . $details . '</p>
                </div>
            </a>';
        }
    }
}
