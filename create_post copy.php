<?php
  include('connection.php');

  session_start();

if(isset($_SESSION["logid"])){
    $id = $_SESSION["logid"];

    $sql = "SELECT * FROM users WHERE id='$id'";

        $result = $con->query($sql);

        while ($row = $result->fetch_assoc()) {

            $uname = $row['uname'];
            $authorid = $row['id'];
        }
    $visguest = "display : none;";
    $visuser = " ";
}
else{
    $visguest = " ";
    $visuser = "display : none;";
}

?>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script defer src="theme.js"></script>
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap" rel="stylesheet" />
</head>

<body>
    <nav class="navbar">
        <ul class="navbar-nav">
            <li class="logo">
                <a href="index.php" class="nav-link">
                    <span class="link-text logo-text">CodeLand</span>
                    <svg aria-hidden="true" focusable="false" data-prefix="fad" data-icon="angle-double-right"
                        role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                        class="svg-inline--fa fa-angle-double-right fa-w-14 fa-5x">
                        <g class="fa-group">
                            <path fill="currentColor"
                                d="M224 273L88.37 409a23.78 23.78 0 0 1-33.8 0L32 386.36a23.94 23.94 0 0 1 0-33.89l96.13-96.37L32 159.73a23.94 23.94 0 0 1 0-33.89l22.44-22.79a23.78 23.78 0 0 1 33.8 0L223.88 239a23.94 23.94 0 0 1 .1 34z"
                                class="fa-secondary"></path>
                            <path fill="currentColor"
                                d="M415.89 273L280.34 409a23.77 23.77 0 0 1-33.79 0L224 386.26a23.94 23.94 0 0 1 0-33.89L320.11 256l-96-96.47a23.94 23.94 0 0 1 0-33.89l22.52-22.59a23.77 23.77 0 0 1 33.79 0L416 239a24 24 0 0 1-.11 34z"
                                class="fa-primary"></path>
                        </g>
                    </svg>
                </a>
            </li>

            <li class="nav-item">
                <a href="index.php" class="nav-link">
                    <svg aria-hidden="true" focusable="false" data-prefix="fad" data-icon="cat"
                        class="svg-inline--fa fa-cat fa-w-16 fa-9x" role="img" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 640 512">
                        <g class="fa-group">
                            <path fill="currentColor" class="fa-primary" d="M624,448c8.8,0,16,7.2,16,16c0,26.5-21.5,48-48,48H303.1c-25.6,0-48-21.5-48-48c0-8.8,8.1-16,16-16h32V288
			c0-17.7,15.2-32,32.9-32h224c17.7,0,32,14.3,32,32v160H624z M544,448V304H352v144H544z" />
                            <path fill="currentColor" class="fa-secondary" d="M480,224H336c-19.1,0-36.3,8.4-48,21.7V208c0-8.8-7.2-16-16-16h-64c-8.8,0-16,7.2-16,16v64c0,8.8,7.2,16,16,16h63.1v128
			H112c-26.5,0-48-21.5-48-48V256H32c-13.2,0-25-8.1-29.8-20.3c-4.8-12.3-1.6-26.3,8.1-35.2l208-192c12.3-11.3,31.1-11.3,43.4,0
			l208,192C476.4,206.7,480,215.2,480,224z" />
                        </g>
                    </svg>
                    <label class="mobilelabel"
                        style="margin-left: -63px;margin-right:14px;">HOME</label>
                    <span class="link-text">HOME</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="profile.php" class="nav-link">
                    <svg aria-hidden="true" focusable="false" data-prefix="fad" data-icon="alien-monster" role="img"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                        class="svg-inline--fa fa-alien-monster fa-w-18 fa-9x">
                        <g class="fa-group">
                            <path fill="currentColor" class="fa-secondary"
                                d="M576,128v304c0,26.5-21.5,48-48,48H48c-26.5,0-48-21.5-48-48V128H576z M512,336c0-8.8-7.2-16-16-16H368
                            c-8.8,0-16,7.2-16,16s7.2,16,16,16h128C504.8,352,512,344.8,512,336z M512,208c0-8.8-7.2-16-16-16H368c-8.8,0-16,7.2-16,16
                            s7.2,16,16,16h128C504.8,224,512,216.8,512,208z M512,272c0-8.8-7.2-16-16-16H368c-8.8,0-16,7.2-16,16s7.2,16,16,16h128
                            C504.8,288,512,280.8,512,272z M272,416c8.8,0,16-7.2,16-16c0-26.5-21.5-48-48-48H112c-26.5,0-48,21.5-48,48c0,8.8,7.2,16,16,16
                            H272z M240,256c0-35.3-28.6-64-64-64c-35.3,0-64,28.7-64,64s28.6,64,64,64S240,291.3,240,256z" />
                            <path fill="currentColor" class="fa-primary"
                                d="M576,80v16H0V80c0-26.5,21.5-48,48-48h480C554.5,32,576,53.5,576,80z" />
                        </g>
                    </svg>
                    <label class="mobilelabel"
                        style="margin-left: -73px;margin-right:8px;">PROFILE</label>
                    <span class="link-text">PROFILE</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="category.php" class="nav-link">
                    <svg aria-hidden="true" focusable="false" data-prefix="fad" data-icon="space-station-moon-alt"
                        role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                        class="svg-inline--fa fa-space-station-moon-alt fa-w-16 fa-5x">
                        <g class="fa-group">
                            <circle fill="currentColor" class="fa-primary" cx="128" cy="352" r="32" />
                            <path fill="currentColor" class="fa-primary"
                                d="M448,328c13.3,0,24,10.7,24,24s-10.7,24-24,24H224c-13.3,0-24-10.7-24-24s10.7-24,24-24H448z" />
                            <path class="fa-secondary" fill="currentColor" d="M576,96v320c0,35.3-28.7,64-64,64H64c-35.3,0-64-28.7-64-64V96c0-35.3,28.6-64,64-64h448C547.3,32,576,60.7,576,96z
			 M472,160c0-13.3-10.7-24-24-24H224c-13.3,0-24,10.7-24,24s10.7,24,24,24h224C461.3,184,472,173.3,472,160z M472,256
			c0-13.3-10.7-24-24-24H224c-13.3,0-24,10.7-24,24c0,13.3,10.7,24,24,24h224C461.3,280,472,269.3,472,256z M472,352
			c0-13.3-10.7-24-24-24H224c-13.3,0-24,10.7-24,24s10.7,24,24,24h224C461.3,376,472,365.3,472,352z M160,160c0-17.7-14.3-32-32-32
			s-32,14.3-32,32s14.3,32,32,32S160,177.7,160,160z M160,256c0-17.7-14.3-32-32-32s-32,14.3-32,32s14.3,32,32,32S160,273.7,160,256
			z M160,352c0-17.7-14.3-32-32-32s-32,14.3-32,32s14.3,32,32,32S160,369.7,160,352z" />
                            <path fill="currentColor" class="fa-primary"
                                d="M448,232c13.3,0,24,10.7,24,24c0,13.3-10.7,24-24,24H224c-13.3,0-24-10.7-24-24c0-13.3,10.7-24,24-24H448z" />
                            <circle fill="currentColor" class="fa-primary" cx="128" cy="256" r="32" />
                        </g>
                    </svg>
                    <label class="mobilelabel"
                        style="margin-left: -54px;margin-right:25px;">ALL</label>
                    <span class="link-text">ALL POSTS</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="post.php" class="nav-link" style="filter: grayscale(0%) opacity(1);background: var(--bg-secondary);
                color: var(--text-secondary);">
                    <svg aria-hidden="true" focusable="false" data-prefix="fad" data-icon="space-shuttle" role="img"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                        class="svg-inline--fa fa-space-shuttle fa-w-20 fa-5x">
                        <g class="fa-group">
                            <path fill="currentColor" class="fa-primary" d="M332.8,125.3c7.6-7.1,17.3-10.5,26.9-10.2c9.6,0.3,19.1,4.2,26.2,11.8l21.3,22.5c14.2,15,13.6,37.7-1.6,52.8
			L384.5,222L311.6,145L332.8,125.3z" />
                            <path class="fa-primary" d="M300.5,152c24.1,26.1,48.2,52.3,72.3,78.4c-48.1,47.8-96.2,95.6-144.4,143.3c-4.9,4.8-11,8.2-17.7,9.8
			c-22.4,5.2-72.1,15.7-72.1,15.7c-0.6,0.1-1.2,0.1-1.8,0.1c-5.8,0-10.4-5.2-9.2-11.1l16.2-71.6c1.6-6.9,5.1-13.2,10.1-18.2
			C202.7,249.6,251.6,200.8,300.5,152z" />
                            <path fill="currentColor" class="fa-secondary" d="M372.8,230.4c-24.1-26.1-48.2-52.3-72.3-78.4c-48.9,48.8-97.8,97.7-146.7,146.5c-5,5-8.5,11.3-10.1,18.2l-16.2,71.6
			c-1.2,5.9,3.5,11.1,9.2,11.1c0.6,0,1.2,0,1.8-0.1c0,0,49.7-10.5,72.1-15.7c6.7-1.6,12.8-5,17.7-9.8
			C276.6,326,324.7,278.2,372.8,230.4z M359.7,115.1c-9.7-0.3-19.3,3-26.9,10.2L311.6,145l72.8,76.9l21.2-19.8
			c15.2-15,15.8-37.7,1.6-52.8L386,126.9C378.9,119.4,369.4,115.4,359.7,115.1z M82.3,32h411.4c45.4,0,82.3,28.6,82.3,64v320
			c0,35.4-36.8,64-82.3,64H82.3C36.8,480,0,451.3,0,416V96C0,60.6,36.8,32,82.3,32z" />
                        </g>
                    </svg><label class="mobilelabel"
                        style="margin-left: -61px;margin-right:20px;">POST</label>
                    <span class="link-text">POST</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="contests.php" class="nav-link">
                    <svg aria-hidden="true" focusable="false" data-prefix="fad" data-icon="space-shuttle" role="img"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                        class="svg-inline--fa fa-space-shuttle fa-w-20 fa-5x">
                        <g class="fa-group">
                            <path fill="currentColor" class="fa-secondary" d="M572.1,82.4C569.5,71.6,559.8,64,548.7,64H447.9c0.2-12.5,0.1-23.7-0.2-33c-0.4-17.3-14.5-31-31.9-31H160.2
	c-17.4,0-31.5,13.6-32,31c-1.1,9.3-0.4,20.6-0.1,33H27.3C16.2,64,6.5,71.6,3.9,82.4c-0.8,3.4-19.6,84.8,33.2,163.5
	c37.4,55.8,100.6,95,187.5,117.4c18.7,4.8,31.4,22.1,31.4,41.4c0,23.8-19.5,43.3-43.4,43.3H208c-26.5,0-48,21.5-48,48
	c0,8.8,7.2,16,15.1,16h223.1c8.8,0,15.1-7.2,15.1-16c0-26.5-21.5-48-48-48h-4.6c-23.9,0-43.4-19.5-43.4-43.4
	c0-19.3,12.7-36.6,31.4-41.4c87-22.3,150.1-61.5,187.5-117.4C591.7,167.2,572.9,85.8,572.1,82.4z M77.4,219.8
	C49.5,178.6,47,135.7,48.4,112h80.4c5.4,59.6,20.4,131.1,57.7,189.1C137.4,281.6,100.9,254.4,77.4,219.8z M498.6,219.8
	c-23.4,34.6-59.9,61.7-109,81.2c37.3-57.9,52.3-129.4,57.6-189h80.4C528.1,135.7,526.5,178.7,498.6,219.8z" />
                            <polygon fill="currentColor" class="st0" points="213,349.4 224.6,363.6 186.4,352.2 145,335.3 112.6,317.7 81.7,295.5 54.3,268.8 33.5,240.7 
			12.6,197.5 3.9,164.8 0,121.3 3.9,82.7 8.3,73.6 14.4,68.1 27.3,64.3 48.1,64.3 128.1,64.3 128.8,112.3 48.4,112.3 49.1,141.3 
			53.6,167 59.8,186.4 71.7,211.1 85.8,231.5 117.3,262.5 134.1,274.7 158.3,288.7 186.4,301.5 194,317.4 204,335.4 		" />
                            <polygon fill="currentColor" class="st0" points="572,81.7 575.9,120.3 572,163.8 563.3,196.5 542.5,239.7 521.6,267.8 494.2,294.5 463.3,316.7 
			431,334.3 389.5,351.2 351.3,362.6 362.9,348.4 371.9,334.4 381.9,316.4 389.5,300.5 417.6,287.7 441.8,273.7 458.6,261.5 
			490.1,230.5 504.2,210.1 516.1,185.4 522.3,166 526.8,140.3 527.5,111.3 447.1,111.3 447.8,63.3 527.8,63.3 548.7,63.3 
			561.5,67.1 567.6,72.6 		" />
                        </g>
                    </svg>
                    <label class="mobilelabel"
                        style="margin-left: -64px;margin-right:14px;">APPSS</label>
                    <span class="link-text">APPS</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="live_chat.php" class="nav-link">
                    <svg aria-hidden="true" focusable="false" data-prefix="fad" data-icon="space-shuttle" role="img"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"
                        class="svg-inline--fa fa-space-shuttle fa-w-20 fa-5x">
                        <g class="fa-group">
                            <path fill="currentColor" class="fa-secondary" d="M5.4,135.2c-4.3-2.5-6.4-7.7-4.9-12.4c7.3-22.7,18.9-41.7,33.8-58.5c2-2.3,4.8-3.4,7.7-3.4c1.9,0,3.7,0.5,5.4,1.5
			c9.9,5.6,19.7,11.3,29.6,17c0.8-0.7,1.9-1.6,3.3-2.7c8.7-7,16.6-11.5,21.2-13.8c5.3-2.7,10.8-5.1,16.5-7.1V21.6
			c0-4.9,3.4-9.3,8.3-10.3C137.1,9,148.4,7.7,160,7.7s22.9,1.3,33.8,3.6c4.8,1,8.3,5.4,8.3,10.4v34.1c15.2,5.3,28.9,13.4,40.9,23.7
			l29.6-17.1c1.7-1,3.6-1.5,5.4-1.5c2.9,0,5.7,1.2,7.7,3.4c14.9,16.8,26.5,35.8,33.8,58.5c1.6,4.7-0.6,9.9-4.9,12.4l-29,15.9
			c1.5,8.7,2.4,16.7,2.4,25c0,8.1-0.9,16-2.4,23.8l29,16.7c4.3,2.5,6.5,7.7,4.9,12.4c-7.3,21.8-18.9,41.6-33.8,58.4
			c-2,2.3-4.8,3.5-7.7,3.5c-1.9,0-3.7-0.5-5.4-1.5l-29.3-16.9c-12,10.4-25.9,18.5-41.2,23.9V330c0,4.9-3.4,9.3-8.3,10.3
			c-10.9,2.3-22.2,3.7-33.8,3.7s-22.9-1.4-33.8-3.6c-4.8-1-8.3-5.4-8.3-10.3v-33.7c-15.3-5.4-29.2-13.5-41.2-23.9l-29.3,16.9
			c-1.7,1-3.6,1.4-5.4,1.4c-2.9,0-5.8-1.1-7.8-4.3C19.3,269.7,7.7,249.8,0.5,228c-1.6-3.8,0.6-9,4.9-11.5l29-16.8
			c-1.5-7.7-2.4-15.6-2.4-23.8c0-8.3,0.9-16.3,2.4-24.1L5.4,135.2z M208,176.1c0-26.5-21.5-48-48-48s-48,21.5-48,48s21.5,48,48,48
			S208,202.6,208,176.1z" />
                            <path fill="currentColor" class="fa-primary"
                                d="M628.5,318.2c2.3,10.9,3.6,22.2,3.6,33.8s-1.3,22.9-3.6,33.8c-1,4.8-5.4,8.3-10.4,8.3H584
			c-5.3,15.2-13.4,29-23.6,41l17.1,29.6c1,1.7,1.4,3.6,1.4,5.4c0,2.9-1.1,5.6-3.4,7.6c-16.8,14.9-36.7,26.6-58.5,33.8
			c-4.7,1.6-9.9-0.6-12.4-4.9l-16.8-29c-7.8,1.5-15.9,2.4-24.1,2.4s-16.1-0.9-23.8-2.4l-16.7,29c-2.5,4.3-7.7,6.5-12.4,4.9
			c-21.8-7.3-41.8-18.8-58.6-33.7c-2.3-2-3.3-4.9-3.3-7.8c0-1.9,0.5-3.7,1.4-5.4l16.9-29.3c-10.4-12-18.5-25.9-23.9-41.2h-33.7
			c-4.9,0-9.5-3.4-10.4-8.3c-2.3-10.9-3.5-22.2-3.5-33.8c0-11.6,1.1-22.9,3.4-33.8c1-4.8,5.6-8.2,10.5-8.2h33.7
			c5.4-15.3,13.5-29.2,23.9-41.2l-16.9-29.3c-1-1.7-1.5-3.6-1.5-5.4c0-2.9,1.2-5.7,3.4-7.7c16.8-14.9,36.7-26.5,58.5-33.7
			c4.7-1.6,9.9,0.6,12.4,4.9l16.8,29c7.7-1.5,15.6-2.4,23.8-2.4c7.4,0,15.4,0.9,24.1,2.4l16.8-29c2.5-4.3,7.7-6.4,12.4-4.9
			c21.8,7.3,41.7,18.9,58.5,33.8c2.3,2,3.4,4.8,3.4,7.6c0,1.9-0.5,3.7-1.5,5.4l-17,29.5c10.3,12,18.3,25.7,23.7,41h34.1
			C623.1,310,627.5,313.4,628.5,318.2z M511.7,352c0-26.5-21.5-48-48-48s-48,21.5-48,48s21.5,48,48,48S511.7,378.5,511.7,352z" />
                        </g>
                    </svg>
                    <label class="mobilelabel"
                        style="margin-left: -70px;margin-right:9px;">SHOUT</label>
                    <span class="link-text">SHOUT BOX</span>
                </a>
            </li>

            <li class="nav-item" id="themeButton">
                <a href="#" class="nav-link">
                    <svg class="theme-icon" id="lightIcon" aria-hidden="true" focusable="false" data-prefix="fad"
                        data-icon="moon-stars" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                        class="svg-inline--fa fa-moon-stars fa-w-16 fa-7x">
                        <g class="fa-group">
                            <path fill="currentColor"
                                d="M320 32L304 0l-16 32-32 16 32 16 16 32 16-32 32-16zm138.7 149.3L432 128l-26.7 53.3L352 208l53.3 26.7L432 288l26.7-53.3L512 208z"
                                class="fa-secondary"></path>
                            <path fill="currentColor"
                                d="M332.2 426.4c8.1-1.6 13.9 8 8.6 14.5a191.18 191.18 0 0 1-149 71.1C85.8 512 0 426 0 320c0-120 108.7-210.6 227-188.8 8.2 1.6 10.1 12.6 2.8 16.7a150.3 150.3 0 0 0-76.1 130.8c0 94 85.4 165.4 178.5 147.7z"
                                class="fa-primary"></path>
                        </g>
                    </svg>
                    <svg class="theme-icon" id="solarIcon" aria-hidden="true" focusable="false" data-prefix="fad"
                        data-icon="sun" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                        class="svg-inline--fa fa-sun fa-w-16 fa-7x">
                        <g class="fa-group">
                            <path fill="currentColor"
                                d="M502.42 240.5l-94.7-47.3 33.5-100.4c4.5-13.6-8.4-26.5-21.9-21.9l-100.4 33.5-47.41-94.8a17.31 17.31 0 0 0-31 0l-47.3 94.7L92.7 70.8c-13.6-4.5-26.5 8.4-21.9 21.9l33.5 100.4-94.7 47.4a17.31 17.31 0 0 0 0 31l94.7 47.3-33.5 100.5c-4.5 13.6 8.4 26.5 21.9 21.9l100.41-33.5 47.3 94.7a17.31 17.31 0 0 0 31 0l47.31-94.7 100.4 33.5c13.6 4.5 26.5-8.4 21.9-21.9l-33.5-100.4 94.7-47.3a17.33 17.33 0 0 0 .2-31.1zm-155.9 106c-49.91 49.9-131.11 49.9-181 0a128.13 128.13 0 0 1 0-181c49.9-49.9 131.1-49.9 181 0a128.13 128.13 0 0 1 0 181z"
                                class="fa-secondary"></path>
                            <path fill="currentColor" d="M352 256a96 96 0 1 1-96-96 96.15 96.15 0 0 1 96 96z"
                                class="fa-primary"></path>
                        </g>
                    </svg>
                    <svg class="theme-icon" id="darkIcon" aria-hidden="true" focusable="false" data-prefix="fad"
                        data-icon="sunglasses" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                        class="svg-inline--fa fa-sunglasses fa-w-18 fa-7x">
                        <g class="fa-group">
                            <path fill="currentColor"
                                d="M574.09 280.38L528.75 98.66a87.94 87.94 0 0 0-113.19-62.14l-15.25 5.08a16 16 0 0 0-10.12 20.25L395.25 77a16 16 0 0 0 20.22 10.13l13.19-4.39c10.87-3.63 23-3.57 33.15 1.73a39.59 39.59 0 0 1 20.38 25.81l38.47 153.83a276.7 276.7 0 0 0-81.22-12.47c-34.75 0-74 7-114.85 26.75h-73.18c-40.85-19.75-80.07-26.75-114.85-26.75a276.75 276.75 0 0 0-81.22 12.45l38.47-153.8a39.61 39.61 0 0 1 20.38-25.82c10.15-5.29 22.28-5.34 33.15-1.73l13.16 4.39A16 16 0 0 0 180.75 77l5.06-15.19a16 16 0 0 0-10.12-20.21l-15.25-5.08A87.95 87.95 0 0 0 47.25 98.65L1.91 280.38A75.35 75.35 0 0 0 0 295.86v70.25C0 429 51.59 480 115.19 480h37.12c60.28 0 110.38-45.94 114.88-105.37l2.93-38.63h35.76l2.93 38.63c4.5 59.43 54.6 105.37 114.88 105.37h37.12C524.41 480 576 429 576 366.13v-70.25a62.67 62.67 0 0 0-1.91-15.5zM203.38 369.8c-2 25.9-24.41 46.2-51.07 46.2h-37.12C87 416 64 393.63 64 366.11v-37.55a217.35 217.35 0 0 1 72.59-12.9 196.51 196.51 0 0 1 69.91 12.9zM512 366.13c0 27.5-23 49.87-51.19 49.87h-37.12c-26.69 0-49.1-20.3-51.07-46.2l-3.12-41.24a196.55 196.55 0 0 1 69.94-12.9A217.41 217.41 0 0 1 512 328.58z"
                                class="fa-secondary"></path>
                            <path fill="currentColor"
                                d="M64.19 367.9c0-.61-.19-1.18-.19-1.8 0 27.53 23 49.9 51.19 49.9h37.12c26.66 0 49.1-20.3 51.07-46.2l3.12-41.24c-14-5.29-28.31-8.38-42.78-10.42zm404-50l-95.83 47.91.3 4c2 25.9 24.38 46.2 51.07 46.2h37.12C489 416 512 393.63 512 366.13v-37.55a227.76 227.76 0 0 0-43.85-10.66z"
                                class="fa-primary"></path>
                        </g>
                    </svg>
                    <label class="mobilelabel"
                        style="margin-left: -66px;margin-right:12px;">THEME</label>
                    <span class="link-text">Themify</span>
                </a>
            </li>
        </ul>
    </nav>

    <main>
        <div class="logged-in" style="<?= $visuser ?> margin-top: 10px;">
        <div class="regform" style="margin-top: 10px;">

            <h1 style="margin-top: 0px;">Create A Post</h1>

            <form action="subdir/post_now.php" method="POST">

                <input style="font-weight:bold; font-size:18;" class="pbox" type="text" name="title"
                    placeholder="Post Title" required><br>

                <div class="ptbox">
                    <label class="cat-label">Main Post</label><br><textarea class="post-content-area" name="content"
                        cols="50" rows="10" placeholder="Your Post Text Here" required></textarea><br>
                </div>

                <br>

                <label class="cat-label">Category : </label>
                <input type="radio" id="html" name="cat" value="WEB">
                <label for="web">WEB</label>
                <input type="radio" id="css" name="cat" value="SOFTWARE">
                <label for="software">SOFTWARE</label>
                <input type="radio" id="javascript" name="cat" value="GAME">
                <label for="game">GAME</label>
                <input type="radio" id="javascript" name="cat" value="NOTICE">
                <label for="game">NOTICE</label>

                <br><label class="ptitle">Tags :&nbsp;&nbsp;</label><input style="font-weight:none;font-style: italic;"
                    class="ptagbox" type="text" name="tags" placeholder="tags" required>

                <br><input style="margin-bottom: 50px;" type="submit" name="Submit" id="Submit" value="Post Now" class="signup"
                    style="margin-left:13px;" required><br><br>
            </form>
        </div>

        <script src="ckeditor/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('content');
        </script>
        <script>
            let arrow = document.querySelectorAll(".arrow");
            for (var i = 0; i < arrow.length; i++) {
                arrow[i].addEventListener("click", (e) => {
                    let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
                    arrowParent.classList.toggle("showMenu");
                });
            }
            let sidebar = document.querySelector(".sidebar");
            let sidebarBtn = document.querySelector(".bx-menu");
            console.log(sidebarBtn);
            sidebarBtn.addEventListener("click", () => {
                sidebar.classList.toggle("close");
            });
        </script>
        </div>

        <div class="not-logged-in" style="<?= $visguest ?>">
        <div class="regform" style="margin-top: 10px;">
            <h1>You are not logged in!<br>Please Login or Register</h1>
            <button class="signup" onclick="location.href = 'login.php';">Login</button>
            <button class="signup" onclick="location.href = 'reg.php';">Register</button>
        </div>
        </div>

        </div>
    </main>
</body>