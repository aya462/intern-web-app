<!DOCTYPE html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" href="styles.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	 <style>
        @import url('https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap');

*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  list-style: none;
  text-decoration: none;
  font-family: 'Josefin Sans', sans-serif;
}


body{
   background-color: #f3f5f9;
   
}

.wrapper{
  display: flex;
  position: relative;
 
}

.wrapper .sidebar{
  width: 200px;
  height: 100%;
  background: #4b4276;
  padding: 30px 0px;
  position: fixed;
}

.wrapper .sidebar h2{
  color: #fff;
  text-transform: uppercase;
  text-align: center;
  margin-bottom: 30px;
  font-size: 27px;
}

.wrapper .sidebar ul li{
  padding: 15px;
  border-bottom: 1px solid #bdb8d7;
  border-bottom: 1px solid rgba(0,0,0,0.05);
  border-top: 1px solid rgba(255,255,255,0.05);
}    

.wrapper .sidebar ul li a{
  color: #bdb8d7;
  display: block;
}

.wrapper .sidebar ul li a .fas{
  width: 25px;
}

.wrapper .sidebar ul li:hover{
  background-color: #594f8d;
}
    
.wrapper .sidebar ul li:hover a{
  color: #fff;
}
 
.wrapper .sidebar .social_media{
  position: absolute;
  bottom: 0;
  left: 50%;
  transform: translateX(-50%);
  display: flex;
}

.wrapper .sidebar .social_media a{
  display: block;
  width: 40px;
  background: #594f8d;
  height: 40px;
  line-height: 45px;
  text-align: center;
  margin: 0 5px;
  color: #bdb8d7;
  border-top-left-radius: 5px;
  border-top-right-radius: 5px;
}

.wrapper .main_content{
  width: 100%;
  margin-left: 200px;
}

.wrapper .main_content .header{
  padding: 20px;
  background: #fff;
  color: #717171;
  border-bottom: 1px solid #e0e4e8;
  
}

.wrapper .main_content .info{
  margin: 20px;
  color: #717171;
  line-height: 25px;
}

.wrapper .main_content .info div{
  margin-bottom: 20px;
}
.sidebar ul li a:hover i.fas.fa-sign-out-alt:before {
   
    color: #fff;}
 .sidebar ul li a .fas {
  width: 25px;
  margin-right: 10px;
}
.list {
  border: 1px solid #ccc;
  padding: 16px;
  margin: 100px ;
  align-items:center;
}

.list ul {
  list-style: none;
  padding: 10px;
  margin: 20px;
}

.list li {
  margin-bottom: 16px;
}

.list p {
  margin: 0;
  font-size:20px;
  font-family: 'Josefin Sans', sans-serif;
  
}

.list a {
  color: #0066cc;
  text-decoration: none;
}
.list i{
  color:purple;
  
}

    </style>
    
   
    
</head>
<body>

<div class="wrapper">
    <div class="sidebar">
        <h2> Espace Responsable de Stage </h2>
        <img src='Tun.jpg' width='200px' height='70px' >
        <ul>
            <li><a href="afficheliste.php"><i class="fas fa-home"></i>Approuver les demande de stage </a></li>
            <li><a href="liste_accepter.php"><i class="fas fa-user"></i>Liste Stagiaire Accepter</a></li>
            <li><a href="liste_refuser.php"><i class="fas fa-user"></i>Liste Stagiaire Refuser</a></li>
         
           
            <li><a href="listeMsg.php"><i class="fas fa-address-book"></i>Message récus</a></li>
            <li><a href="listeRaport.php"><i class="fas fa-user"></i>les rapports de stage</a></li>
         
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Déconnexion</a></li>
        </ul> 
    </div>
    <div class="main_content">
    
    <div class="header">
  <i class="fas fa-user-circle profile-icon"></i>
               Bienvenue Responsable
</div>


       
          
        </div>
        
     
    </div>
</div>

</body>
</html>


