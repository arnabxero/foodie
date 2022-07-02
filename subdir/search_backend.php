<?php

class searchNow
{
    function all_search($search_str)
    {
        include('include/connection.php');
    }
    function blog_search($search_str)
    {
        include('include/connection.php');

        $all_post_sql = "SELECT * FROM posts WHERE title LIKE '%" . $search_str . "%' ORDER BY id DESC";
        $all_post_res = mysqli_query($con, $all_post_sql);

        while ($all_post_row = mysqli_fetch_assoc($all_post_res)) {
            $all_poster_id = $all_post_row['user_id'];
            $all_user_details_row = get_user_details($all_poster_id);
            $all_username = $all_user_details_row['first_name'];

            $date_time = $all_post_row['date_time'];
            $content = $all_post_row['post'];
            if (strlen($content) > 330) {
                $content = substr($content, 0, 330);
            }
            $title = $all_post_row['title'];
            if (strlen($title) > 33) {
                $title = substr($title, 0, 33);
            }
            $post_id = $all_post_row['id'];

            //////////////////////////
            $like_sql = "SELECT * FROM likes WHERE post_id = '$post_id'";
            $like_res = mysqli_query($con, $like_sql);
            $total_likes = mysqli_num_rows($like_res);
            /////////////////////////////////////


            echo '
                        <div class="col-sm-6 col-md-4 col-lg-4">
                            <div class="box">
                                <div class="option_container">
                                    <div class="options">
                                        <a href="view_post.php?id=' . $post_id . '" class="option2">
                                            View Post
                                        </a>
                                    </div>
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        ' . $all_username . '
                                    </h5>
                                    <small>
                                        ' . $date_time . ' <br>
                                       Liked By : ' . $total_likes . ' <i class="fa fa-heart" style="color:red;"></i>
                                    </small>
                                </div>

                                <hr>
                                <h6><strong>' . $title . '</strong></h6>
                                <hr>

                                <div style="text-align:justify;">
                                    <p>
                                        ' . $content . '
                                    </p>
                                </div>
                            </div>
                        </div>
                    ';
        }
    }
    function rest_search($search_str)
    {
        include('include/connection.php');
        $sql = "SELECT * FROM restaurants WHERE name LIKE '%" . $search_str . "%'";
        $res = mysqli_query($con, $sql);


        while ($row = mysqli_fetch_assoc($res)) {


            $details = $row['details'];

            if (strlen($details) > 30) {
                $details = substr($details, 0, 30);
            }

            $rest_id = $row['id'];

            $menu_sql = "SELECT * FROM menu WHERE rest_id = '$rest_id'";
            $menu_res = mysqli_query($con, $menu_sql);
            $menu_count = mysqli_num_rows($menu_res);

            ///////////////////////////////
            $rev_sql = "SELECT * FROM reviews WHERE rest_id = '$rest_id'";
            $rev_res = mysqli_query($con, $rev_sql);
            $total_reviews = mysqli_num_rows($rev_res);
            $avg_rate = 0;

            while ($rev_row = mysqli_fetch_assoc($rev_res)) {
                $avg_rate = $avg_rate + $rev_row['rate'];
            }
            if ($total_reviews > 0) {
                $avg_rate = $avg_rate / $total_reviews;
            }


            $floored_rate = number_format($avg_rate, 0);
            $avg_rate = number_format($avg_rate, 1);

            /////////////////////////////////
            echo '
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <div class="box">
                            <div class="option_container">
                                <div class="options">
                                    <a href="view_restaurant.php?id=' . $row['id'] . '" class="option2">
                                    View Restaurant
                                    </a>
                                </div>
                            </div>
                            <div class="img-box">
                                <img src="files/rest_dp/' . $row['pro_pic'] . '" alt="">
                            </div>
                            <div class="detail-box">
                                <h5>
                                    ' . $row['name'] . '
                                </h5>
                                <h6>';

            echo $this->show_star($floored_rate);
            echo '<br>Rating: ' . $avg_rate . '

                                </h6>
                            </div>
                        </div>
                        </div>';
        }
    }
    function get_rest_row($id)
    {
        include('include/connection.php');

        $sql = "SELECT * FROM restaurants WHERE id = '$id'";
        $res = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($res);

        return $row;
    }
    function menu_search($search_str)
    {
        include('include/connection.php');

        $cmnt_sql = "SELECT * FROM menu WHERE name LIKE '%" . $search_str . "%' ORDER BY id DESC";
        $cmnt_res = mysqli_query($con, $cmnt_sql);
        $menu_num = mysqli_num_rows($cmnt_res);

        if ($menu_num == 0) {
            echo '<h3>No Items Yet</h3>';
        }
        while ($row = mysqli_fetch_assoc($cmnt_res)) {

            $rest_row = $this->get_rest_row($row['rest_id']);

            $menu_name = $row['name'];
            $menu_price = $row['price'];

            echo '
                    <div class="col-md-12" style="  box-shadow: 0 2px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); margin-top: 10px; margin-bottom:10px; border: 0px solid black; background-color:white; color:black; padding:15px; border-radius:5px;">
                        <div class="subscribe_form " style="text-align:center;">
                            <div class="heading_container heading_center">
                                <h6>Cuisine Name : ' . $menu_name . '</h6>
                            </div>
                            <hr>
                            <p>Price : ' . $menu_price . '</p>
                            <div font-size: 10px;">
                            <hr>
                            <h6 style="padding: 20px;">Restaurant Name : ' . $rest_row['name'] . '</h6>
                            <a href="view_restaurant.php?id=' . $rest_row['id'] . '" class="blog-edit-a" style="border-radius:5px; font-weight: normal; border: 1px solid black;">View Restaurant</a>
                                
                            </div>
                        </div>
                    </div>
                    ';
        }
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
}
