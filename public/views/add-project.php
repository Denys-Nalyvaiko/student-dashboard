<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/projects.css">

    <script src="https://kit.fontawesome.com/723297a893.js" crossorigin="anonymous"></script>
    <title>PROJECTS</title>
</head>

<body>
    <div class="base-container">
        <nav>
            <img src="public/img/logo.svg">
            <ul>
                <li>
                    <i class="fas fa-project-diagram"></i>
                    <a href="#" class="button">projects</a>
                </li>
                <li>
                    <i class="fas fa-project-diagram"></i>
                    <a href="#" class="button">projects</a>
                </li>
                <li>
                    <i class="fas fa-project-diagram"></i>
                    <a href="#" class="button">projects</a>
                </li>
                <li>
                    <i class="fas fa-project-diagram"></i>
                    <a href="#" class="button">projects</a>
                </li>
            </ul>
        </nav>
        <main>
            <header>
                <div class="search-bar">
                    <form>
                        <input placeholder="search project">
                    </form>
                </div>
                <div class="add-project">
                    <i class="fas fa-plus"></i> add project
                </div>
            </header>
            <section class="project-form">
                <div id="project-1">
                    <!-- <img src="public/img/uploads/project_smile.jpg"> -->
                    <div>
                        <h2>UPLOAD</h2>
                        <form action="addProject" method="POST" ENCTYPE="multipart/form-data" class="upload-project-form">
                          <?php 
                            if(isset($messages)){
                              foreach($messages as $message){
                                echo $message;
                              }
                            }
                          ?>
                          <input type="text" name="title" placeholder="title">
                          <textarea name="description" id="description" cols="30" rows="5" placeholder="description"></textarea>
                          <input type="file" name="file">
                          <button type="submit">Send</button>
                        </form>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>