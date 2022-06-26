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

    function get_rest_name($rid)
    {
        include('include/connection.php');

        $sql = "SELECT * FROM restaurants WHERE id = '$rid'";
        $res = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($res);

        return $row['name'];
    }
    function show_star($stars)
    {
        $star_icon = '<i class="fa fa-star-o"></i>';

        if ($stars == 0) {
            $star_icon = '<i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
        } else if ($stars == 1) {
            $star_icon = '<i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
        } else if ($stars == 2) {
            $star_icon = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
        } else if ($stars == 3) {
            $star_icon = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
        } else if ($stars == 4) {
            $star_icon = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>';
        } else if ($stars == 5) {
            $star_icon = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';
        }
        return $star_icon;
    }


    function revlist_creation($id)
    {
        include('include/connection.php');

        $sql = "SELECT * FROM reviews WHERE user_id = '$id'";
        $res = mysqli_query($con, $sql);

        while ($row = mysqli_fetch_assoc($res)) {

            $content = $this->get_rest_name($row['rest_id']);
            if (strlen($content) > 125) {
                $content = substr($content, 0, 125);
            }
            $details = $row['review'];
            if (strlen($details) > 125) {
                $details = substr($details, 0, 125);
            }
            $pid = $row['rest_id'];

            echo '
            <a href="view_restaurant.php?id=' . $pid . '" style="text-decoration:none;">
                <div class="profile-tab-list">
                    <p>' . $content . '</p>
                    <p>' . $this->show_star($row['rate']) . '</p>
                    <p class="non-time-text" style="font-size:10px;">' . $details . '</p>
                </div>
            </a>';
        }
    }
}
