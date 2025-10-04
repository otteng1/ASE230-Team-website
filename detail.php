<?php

function calculateAge($dob) {
	$today = new DateTime();
	$birthDate = new DateTime($dob);
	$age = $today->diff($birthDate)->y;
	return $age;
}

function displayWorkExperience($experience) {
	echo "
	<div class='work-experience'>
        	<h3>{$experience['title']} at {$experience['company']}</h3>
        	<p><strong>Time:</strong> {$experience['time']}</p>
        	<p>{$experience['description']}</p>
    	</div>";
}


function displayAllExperiences($id) {
	if (!empty($id['experiences'])) {
    		foreach ($id['experiences'] as $experience) {
            	displayWorkExperience($experience);
        	}
    	} else {
        	echo "No work experience available.";
    	}
}


$team = array(
    1 => array(
        "name" => "Alice Johnson",
        "dob" => "2000-03-13",
        "role" => "Frontend Developer",
        "email" => "alice@example.com",
        "phone" => "N/A",
        "linkedIn" => "N/A",
        "bio" => "Loves creating modern and responsive interfaces.",
        "experiences" => array(
            array(
                "title" => "N/A",
                "company" => "N/A",
                "time" => "N/A",
                "description" => "N/A"
            )
        ),
        "skill" => "N/A",
        "project" => "N/A",
        "projectDescription" => "N/A"
    ),
    2 => array(
        "name" => "Bob Smith",
        "dob" => "2001-06-26",
        "role" => "Backend Developer",
        "email" => "bob@example.com",
        "phone" => "N/A",
        "linkedIn" => "N/A",
        "bio" => "Enjoys working with APIs and databases.",
        "experiences" => array(
            array(
                "title" => "N/A",
                "company" => "N/A",
                "time" => "N/A",
                "description" => "N/A"
            )
        ),
        "skill" => "N/A",
        "project" => "N/A",
        "projectDescription" => "N/A"
    ),
    3 => array(
        "name" => "Tyler Otten",
        "dob" => "2004-10-15",
        "role" => "Project Manager",
        "email" => "otteng1@mymail.nku.edu",
        "phone" => "859-308-7228",
        "linkedIn" => "www.linkedin.com/in/georgetylerotten",
        "bio" => "Keeps projects on track and communicates with clients.",
        "experiences" => array(
            array(
                "title" => "Library Associate",
                "company" => "Kenton County Public Library",
                "time" => "July 2024 - Present",
                "description" => "Serve the community by helping dozens of patrons a day access thousands of resources provided by the library through physical or digital means, including working with patrons to find the resources or items they need in the library or through the multitude of databases on our website."
            )
        ),
        "skill" => "Java",
        "project" => "My Own Website",
        "projectDescription" => "This is a personal website I made for INF286."
    )
);

$id = 0;
if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
}

if (!isset($team[$id])) {
    echo "<p>Member not found.</p>";
    exit;
}

$member = $team[$id];
?>
<!DOCTYPE html>
<html lang="en"> 
<head>
    <title><?php echo $team[$id]["name"]; ?>'s Resume</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $team[$id]["name"]; ?>'s resume">
    <meta name="author" content="<?php echo $team[$id]["name"]; ?>">    
    <link rel="shortcut icon" href="favicon.ico"> 
    
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    
    <!-- FontAwesome JS-->
    <script defer src="assets/fontawesome/js/all.min.js"></script>
       
    <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/pillar-1.css">
</head> 

<body>
    <article class="resume-wrapper text-center position-relative">
        <div class="resume-wrapper-inner mx-auto text-start bg-white shadow-lg">
            <header class="resume-header pt-4 pt-md-0">
                <div class="row">
                    <div class="col-block col-md-auto resume-picture-holder text-center text-md-start">
                        <img class="picture" src="assets/images/IMG_0562.jpg" alt="">
                    </div>
                    <div class="col">
                        <div class="row p-4 justify-content-center justify-content-md-between">
                            <div class="primary-info col-auto">
                                <h1 class="name mt-0 mb-1 text-white text-uppercase"><?php echo $team[$id]["name"]; ?></h1>
                                <div class="title mb-3"><?php echo $team[$id]["role"]; ?></div>
				<?php echo calculateAge($team[$id]["dob"]); ?>
                                <ul class="list-unstyled">
                                    <li class="mb-2">
                                        <a class="text-link" href="#">
                                            <i class="far fa-envelope fa-fw me-2" data-fa-transform="grow-3"></i>
                                            <?php echo $team[$id]["email"]; ?>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="text-link" href="#">
                                            <i class="fas fa-mobile-alt fa-fw me-2" data-fa-transform="grow-6"></i>
                                            <?php echo $team[$id]["phone"]; ?>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="secondary-info col-auto mt-2">
                                <ul class="resume-social list-unstyled">
                                    <li class="mb-3">
                                        <a class="text-link" href="#">
                                            <span class="fa-container text-center me-2"><i class="fab fa-linkedin-in fa-fw"></i></span>
                                            <?php echo $team[$id]["linkedIn"]; ?>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <div class="resume-body p-5">
                <section class="resume-section summary-section mb-5">
                    <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Summary</h2>
                    <div class="resume-section-content">
                        <p class="mb-0"><?php echo $team[$id]["bio"]; ?></p>
                    </div>
                </section>

                <div class="row">
                    <div class="col-lg-9">
                        <section class="resume-section experience-section mb-5">
                            <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Work Experience</h2>
                            <div class="resume-section-content">
                                <div class="resume-timeline position-relative">
                                    <article class="resume-timeline-item position-relative pb-5">
                                        <div class="resume-timeline-item-header mb-2">
                                            <?php echo displayAllExperiences($team[$id]) ?>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </section>
                    </div>

                    <div class="col-lg-3">
                        <section class="resume-section skills-section mb-5">
                            <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Skills &amp; Tools</h2>
                            <div class="resume-section-content">
                                <div class="resume-skill-item">
                                    <ul class="list-unstyled mb-4">
                                        <li class="mb-2">
                                            <div class="resume-skill-name"><?php echo $team[$id]["skill"]; ?></div>
                                            <div class="progress resume-progress">
                                                <div class="progress-bar theme-progress-bar-dark" role="progressbar" style="width: 0%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>

                <section class="resume-section projects-section mb-5">
                    <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Projects</h2>
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $team[$id]["project"]; ?></h5>
                                    <p class="card-text"><?php echo $team[$id]["projectDescription"]; ?></p>
                                    <a class="btn btn-outline-primary" href="assets/Otten_Tyler_IndividuallCodeFinal/index.html" target="_blank"><?php echo 'Check it out!'; ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </article> 

    <footer class="footer text-center pt-2 pb-5">
        <small class="copyright">
            Designed with <span class="sr-only">love</span><i class="fas fa-heart"></i> by <?php echo $team[$id]["name"]; ?>
        </small>
    </footer>
</body>
</html>
