<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layout PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}


body {
    font-family: 'Poppins', sans-serif;
    background: #1f1f2e;
    color: #f1f1f1;
    line-height: 1.6;
}


header {
    background: linear-gradient(90deg, #00c6ff, #0072ff);
    color: white;
    padding: 20px;
    text-align: center;
    font-size: 2em;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 3px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
}


#sidebar {
    width: 250px;
    height: 100vh;
    position: fixed;
    top: 0;
    left: 0;
    background: #1e1e2f;
    overflow-y: auto;
    transition: all 0.3s ease-in-out;
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.5);
}

#sidebar h2 {
    background: #27293d;
    color: #00c6ff;
    text-align: center;
    padding: 20px 0;
    font-size: 1.5em;
    border-bottom: 2px solid #00c6ff;
    letter-spacing: 1px;
    text-transform: uppercase;
}

#sidebar ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

#sidebar ul li {
    position: relative;
}

#sidebar ul li a {
    display: block;
    color: #f1f1f1;
    text-decoration: none;
    padding: 15px 20px;
    font-size: 1.2em;
    border-bottom: 1px solid #333;
    transition: all 0.3s ease;
}

#sidebar ul li a:hover {
    background: linear-gradient(90deg, #00c6ff, #0072ff);
    color: white;
    padding-left: 30px;
    border-left: 5px solid #0072ff;
    box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.3);
}


#content {
    margin-left: 270px;
    padding: 30px;
    background: #28293d;
    min-height: 100vh;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    border-radius: 10px;
}

#content h1 {
    font-size: 2.5em;
    color: #00c6ff;
    margin-bottom: 20px;
    text-transform: uppercase;
}

#content p {
    font-size: 1.1em;
    line-height: 1.8;
    color: #cfcfcf;
}


footer {
    background: #1e1e2f;
    color: white;
    text-align: center;
    padding: 15px 0;
    font-size: 1em;
    border-top: 2px solid #00c6ff;
    box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.3);
}

#sidebar ul li a::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    width: 5px;
    height: 100%;
    background: #00c6ff;
    transform: scaleY(0);
    transition: transform 0.3s ease;
}

#sidebar ul li a:hover::before {
    transform: scaleY(1);
}


@media (max-width: 768px) {
    #sidebar {
        width: 200px;
    }

    #content {
        margin-left: 210px;
    }

    #sidebar ul li a {
        font-size: 1em;
    }
}

@media (max-width: 480px) {
    #sidebar {
        width: 100%;
        position: relative;
        height: auto;
    }

    #content {
        margin-left: 0;
    }

    #sidebar ul li {
        text-align: center;
    }
}

</style>
<body>

   
    <header>
        Aplikasi Presensi Siswa
    </header>

    
    <div id="sidebar">
    <nav class="sidebar">
      <h2>SMKN 1 BAWANG</h2>
        <ul>
            <li><a href="?page=beranda">Beranda</a></li>
            <li><a href="?page=presensi">Data Presensi</a></li>
        </ul>
    </div>
    

    
    <div id="content">
       
        <?php
      
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            

            
            switch ($page) {
                case 'presensi':
                    include('datapresensi.php'); 
                    break;
                    }
                    switch ($page) {
                        case '':
                            include('datapresensi.php'); 
                            break;
                            }
            switch ($page) {
                case '':
                    include('beranda.php'); 
                         break;
                         }
                          
            }
             
        ?>
    </div>
        
    </div>

    

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 My Profile.Lusiana</p>
    </footer>

</body>
</html>