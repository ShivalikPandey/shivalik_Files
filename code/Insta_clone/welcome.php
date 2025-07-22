
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      
     
  </style>
    <link rel="stylesheet" href="welcome.css">
    <link rel="stylesheet" href="welcome1000px.css">
    <link rel="stylesheet" href="welcome460px.css">
</head>
<body>
<?php
session_start();
$status="post.jpg";
if($_SESSION['login']==true){
    if($_SERVER['REQUEST_METHOD']=='POST'){
        require 'conn.php';
        $filename=$_FILES["postimage"]["name"];
        $tempname=$_FILES["postimage"]["tmp_name"];
        $path=$_SESSION['username'];
        $password=$_SESSION['password'];
        $folder="details/$path/".$filename;
        $selectsql="SELECT * FROM `images` WHERE name='$path' AND password='$password'";
        $selectsqlrun=mysqli_query($conn,$selectsql);
        $exist=true;
        while($data=mysqli_fetch_assoc($selectsqlrun)){
            $x=1;
            if($exist==true){
                while($x<=64){
                    $image=$data['image'.$x];
                    if($image==NULL){
                        $update="UPDATE `images` SET `image$x`='$folder' WHERE name='$path' AND password='$password'";
                        $updaterun=mysqli_query($conn,$update);
                        move_uploaded_file($tempname,$folder);                
                        break;
                        $exist=false;
                    }
                    else{
                        null;
                    }
                    $x++;
                }
            }
        } 
    }
}
else{
    header("location: login.php");
}
?>
    <div id="leftcorner">
        <img src="splashicon.jpg" id="icon"><img src="instagram.jpg" id="instatext">
        <div class="upercontainer">
            <div class="link">
               <img src="home.jpg" class="icon"><a href="">Home</a>
            </div> 
            <div class="link">
                <img src="search.jpg" class="icon"><a href="">Search</a>
               </div> 
               <div class="link">
                <img src="explore.jpg" class="icon"><a href="">Explore</a>
               </div> 
               <div class="link">
                <img src="reel.jpg" class="icon"><a href="">Reels</a>
               </div>
               <div class="link">
                <img src="messages.jpg" class="icon" id="messagesicon"><a href="">Messages</a>
             </div>
             <div class="link">
                <img src="heart.jpg" class="icon" id="heart"><a href="">Notifications</a>
             </div>
             <div class="link">
                <img src="create.jpg" class="icon" id="create"><a href="" id="createlink">Create</a>
             </div>
             <div class="link">
                <img src="profile.jpg" class="icon" id="profile"><a href="">Profile</a>
             </div>
        </div>
          <div class="lowercontainer">
            <div class="link">
                <img src="more.jpg" class="icon"><a href="">More</a>
             </div>
        </div>
    </div>
       <div id="maindiv">
           <div class="status">
               <div class="username">
               <div class="gradientborder">
                   <img src="status.jpg" class="statusimg">
               </div>
               <p>username</p>
            </div>       
            <div class="username">
                <div class="gradientborder">
                    <img src="status.jpg" class="statusimg">
                </div>
                <p>username</p>
             </div>  
             <div class="username">
                <div class="gradientborder">
                    <img src="status.jpg" class="statusimg">
                </div>
                <p>username</p>
             </div>  
             <div class="username">
                <div class="gradientborder">
                    <img src="status.jpg" class="statusimg">
                </div>
                <p>username</p>
             </div>  
             <div class="username">
                <div class="gradientborder">
                    <img src="status.jpg" class="statusimg">
                </div>
                <p>username</p>
             </div>  
             <div class="username">
                <div class="gradientborder">
                    <img src="status.jpg" class="statusimg">
                </div>
                <p>username</p>
             </div>  
             <div class="username">
                <div class="gradientborder">
                    <img src="status.jpg" class="statusimg">
                </div>
                <p>username</p>
             </div>  
             <div class="username">
                <div class="gradientborder">
                    <img src="status.jpg" class="statusimg">
                </div>
                <p>username</p>
             </div>  
             <div class="username">
                <div class="gradientborder">
                    <img src="status.jpg" class="statusimg">
                </div>
                <p>username</p>
             </div>  
        </div>
        <div class="posts">
            <div class="userpost">
                <div class="postdetails">
                   <div class="profilegradient">
                       <img src="status.jpg" class="profileimg">
                   </div>
                    <p class="detailstext">username</p>
                    <img src="options.jpg" class="postoptions">
                </div>
                   <img src="post.JPG" class="postedimg">
                   <div class="feedback">
                       <img src="heart.jpg" class="feedbackimg"><img src="search.jpg" class="feedbackimg"><img src="share.jpg" class="feedbackimg"><img src="bookmark.jpg" class="bookmark">
                   </div>
                   <div>
                    <p>10 likes</p>
                    <img src="options.jpg" class="commentsoption"><p>view all 5 comments</p>
                   </div>
            </div>
            <div class="userpost">
                <div class="postdetails">
                   <div class="profilegradient">
                       <img src="status.jpg" class="profileimg">
                   </div>
                    <p class="detailstext">username</p>
                    <img src="options.jpg" class="postoptions">
                </div>
                   <img src="post.JPG" class="postedimg">
                   <div class="feedback">
                       <img src="heart.jpg" class="feedbackimg"><img src="search.jpg" class="feedbackimg"><img src="share.jpg" class="feedbackimg"><img src="bookmark.jpg" class="bookmark">
                   </div>
                   <div>
                    <p>10 likes</p>
                    <img src="options.jpg" class="commentsoption"><p>view all 5 comments</p>
                   </div>
            </div>
            <div class="userpost">
                <div class="postdetails">
                   <div class="profilegradient">
                       <img src="status.jpg" class="profileimg">
                   </div>
                    <p class="detailstext">username</p>
                    <img src="options.jpg" class="postoptions">
                </div>
                   <img src="post.JPG" class="postedimg">
                   <div class="feedback">
                       <img src="heart.jpg" class="feedbackimg"><img src="search.jpg" class="feedbackimg"><img src="share.jpg" class="feedbackimg"><img src="bookmark.jpg" class="bookmark">
                   </div>
                   <div>
                    <p>10 likes</p>
                    <img src="options.jpg" class="commentsoption"><p>view all 5 comments</p>
                   </div>
            </div>
            <div class="userpost">
                <div class="postdetails">
                   <div class="profilegradient">
                       <img src="status.jpg" class="profileimg">
                   </div>
                    <p class="detailstext">username</p>
                    <img src="options.jpg" class="postoptions">
                </div>
                   <img src="post.JPG" class="postedimg">
                   <div class="feedback">
                       <img src="heart.jpg" class="feedbackimg"><img src="search.jpg" class="feedbackimg"><img src="share.jpg" class="feedbackimg"><img src="bookmark.jpg" class="bookmark">
                   </div>
                   <div>
                    <p>10 likes</p>
                    <img src="options.jpg" class="commentsoption"><p>view all 5 comments</p>
                   </div>
            </div>

            <div class="userpost">
                <div class="postdetails">
                   <div class="profilegradient">
                       <img src="status.jpg" class="profileimg">
                   </div>
                    <p class="detailstext">username</p>
                    <img src="options.jpg" class="postoptions">
                </div>
                   <img src="post.JPG" class="postedimg">
                   <div class="feedback">
                       <img src="heart.jpg" class="feedbackimg"><img src="search.jpg" class="feedbackimg"><img src="share.jpg" class="feedbackimg"><img src="bookmark.jpg" class="bookmark">
                   </div>
                   <div>
                    <p>10 likes</p>
                    <img src="options.jpg" class="commentsoption"><p>view all 5 comments</p>
                   </div>
            </div>
            <div class="userpost">
                <div class="postdetails">
                   <div class="profilegradient">
                       <img src="status.jpg" class="profileimg">
                   </div>
                    <p class="detailstext">username</p>
                    <img src="options.jpg" class="postoptions">
                </div>
                   <img src="post.JPG" class="postedimg">
                   <div class="feedback">
                       <img src="heart.jpg" class="feedbackimg"><img src="search.jpg" class="feedbackimg"><img src="share.jpg" class="feedbackimg"><img src="bookmark.jpg" class="bookmark">
                   </div>
                   <div>
                    <p>10 likes</p>
                    <img src="options.jpg" class="commentsoption"><p>view all 5 comments</p>
                   </div>
            </div>
            <div class="userpost">
                <div class="postdetails">
                   <div class="profilegradient">
                       <img src="status.jpg" class="profileimg">
                   </div>
                    <p class="detailstext">username</p>
                    <img src="options.jpg" class="postoptions">
                </div>
                   <img src="post.JPG" class="postedimg">
                   <div class="feedback">
                       <img src="heart.jpg" class="feedbackimg"><img src="search.jpg" class="feedbackimg"><img src="share.jpg" class="feedbackimg"><img src="bookmark.jpg" class="bookmark">
                   </div>
                   <div>
                    <p>10 likes</p>
                    <img src="options.jpg" class="commentsoption"><p>view all 5 comments</p>
                   </div>
            </div>
            <div class="userpost">
                <div class="postdetails">
                   <div class="profilegradient">
                       <img src="status.jpg" class="profileimg">
                   </div>
                    <p class="detailstext">username</p>
                    <img src="options.jpg" class="postoptions">
                </div>
                   <img src=<?php echo "$status";?> class="postedimg">
                   <div class="feedback">
                       <img src="heart.jpg" class="feedbackimg"><img src="search.jpg" class="feedbackimg"><img src="share.jpg" class="feedbackimg"><img src="bookmark.jpg" class="bookmark">
                   </div>
                   <div>
                    <p>10 likes</p>
                    <img src="options.jpg" class="commentsoption"><p>view all 5 comments</p>
                   </div>
            </div>
            <div class="userpost">
                <div class="postdetails">
                   <div class="profilegradient">
                       <img src="status.jpg" class="profileimg">
                   </div>
                    <p class="detailstext">username</p>
                    <img src="options.jpg" class="postoptions">
                </div>
                   <img src="post.JPG" class="postedimg">
                   <div class="feedback">
                       <img src="heart.jpg" class="feedbackimg"><img src="search.jpg" class="feedbackimg"><img src="share.jpg" class="feedbackimg"><img src="bookmark.jpg" class="bookmark">
                   </div>
                   <div>
                    <p>10 likes</p>
                    <img src="options.jpg" class="commentsoption"><p>view all 5 comments</p>
                   </div>
               </div>
           </div>   
       </div>
    <div id="lastportion">
           <div class="profile">
           <img src="post.jpg" class="userpro"><p><?php echo $_SESSION['username'];?></p>
           </div>
           <div style="margin-top:3vh;">
               Suggested for you
            </div>
           <div class="suggested">
           <div class="profile">
             <img src="post.jpg" class="userpro"><p class="parag">shubham</p>
           </div>
           <div class="profile">
             <img src="post.jpg" class="userpro"><p class="parag">aman</p>
           </div>
           <div class="profile">
              <img src="post.jpg" class="userpro"><p class="parag">vinay</p>
           </div>
           <div class="profile">
              <img src="post.jpg" class="userpro"><p class="parag">arun</p>
           </div>
           <div class="profile">
              <img src="post.jpg" class="userpro"><p class="parag">sahil</p>
           </div>
           </div>
       </div> 
       
    <script src="welcome.js"></script>
    <script>
         
        let profile=document.getElementById("profile");
let profiledetail=document.getElementById("maindiv");
let lastportion=document.getElementById("lastportion");
laspor=lastportion.innerHTML;
let stapro=profiledetail.innerHTML;
profile.addEventListener('click',profileclicked);
function profileclicked(){
    if(run==true){
        
        lastportion.innerHTML="<div style='display:none;'></div>";
        const xhr=new XMLHttpRequest();
        xhr.open("GET","ajaxdata.php",true);
        xhr.responseType="json";
        xhr.onload=()=>{
            if(xhr.status===200){
              
                profiledetail.innerHTML="<div><div id='main'><div id='userimgbordergradient'><img src='post.jpg' id='userimage'></div><p id='profileusername'><?php echo $_SESSION['username'];?></p><form><input type='button' class='profilebutton' value='Edit profile'><input type='button' class='profilebutton' value='view archive'></form><img src='options.jpg' id='optionabg'></div><div id='followerdetails'><p>8 posts</p><p>46 follower</p><p>120 following</p></div><div><input type='button' value='Posts' class='test1'><input type='button' value='Saved' class='test2' ><input type='button' value='Tagged' class='test3' ></div><div id='imagessection'>    </div></div>";
              
               let images=document.getElementById('imagessection');
                x=xhr.response;
              function call(){
            tags=document.createElement('img');
            tags.src='';
            tags.className='myimages';
            done=images.appendChild(tags);
        }
        i=1;
              while(i<64){
               call();
                i++;
              /*  
                              vn=x["image"+i];

              v="image"+i;
                vn=v;
                console.log(vn);
                vs=xhr.response;
                vt=vs.vn;
                console.log(vt);
<img src='' class='myimages' id='imagessection'>
                i++;*/
              }
              
              j=0;
              while(j<64){
               let imgesess=document.getElementsByClassName('myimages'); 
                z=j+1;       
                 vn=x["image"+z];
                 console.log(vn);
                 c=imgesess[j];
                 c.src=vn;
                 console.log(c);
                 j++;
              }
             
            }else{
                console.log("error");
            }
        }
        xhr.send();
        run=false;
        } 
        else if (run==false) {
            lastportion.innerHTML=laspor;
            profiledetail.innerHTML=stapro;
            run=true;
        }
}
    </script>  
</body>
</html>



<?php /*

<?php $path=$_SESSION['username'];
        $password=$_SESSION['password'];$folder="details/$path/".$filename;
        $selectsql="SELECT * FROM `images` WHERE name='$path' AND password='$password'";$selectsqlrun=mysqli_query($conn,$selectsql);while($data=mysqli_fetch_assoc($selectsqlrun)){$x=1; while($x<=64){$image=$data['image'.$x];?><img src='<?php echo $image;?>' class='myimages'><?php $x++;}}?> 



while($data=mysqli_fetch_assoc($selectsqlrun)){$check=1;while($check<=64){$image=$data['image'.$x];if($image==NULL){null;}else{?><img src='<?php echo $data[$image];?>'class='myimages'><?php}$check++;}}?>


<?php while($data=mysqli_fetch_assoc($selectsqlrun)){$check=1;while($check<=64){$image=$data['image'.$x];if($image==NULL){null;}else{?><img src='<?php echo $data['image'.$x];?>'class='myimages'><?php} $check++;}}?>


while($data=mysqli_fetch_assoc($selectsqlrun)){$check=1;while($check<=64){$image=$data['image'.$x];if($image==NULL){null;}else{?><img src='<?php echo $data['image'.$x];?>'class='myimages'><?php}$check++;}}?>
*/?>
<!--


   <div id='main'><div id='userimgbordergradient'><img src='post.jpg' id='userimage'></div><p id='profileusername'></p><form><input type='button' class='profilebutton' value='Edit profile'><input type='button' class='profilebutton' value='view archive'></form><img src='options.jpg' id='optionabg'></div><div id='followerdetails'><p>8 posts</p><p>46 follower</p><p>120 following</p></div>
   hr{
    width: 70%;
    margin-left: 5vw;
    margin-top: 30vh;
    position: fixed;
    border-top: 1px solid gray;
    z-index: 100;

}

while($data=mysqli_fetch_assoc($selectsqlrun)){$check=1;while($check<=64){$image=$data['image'.$x];if($image==NULL){null;}else{?><img src='' class='myimages'>}$check++;}}


while($data=mysqli_fetch_assoc($selectsqlrun)){
    $check=1;while($check<=64){
        $image=$data['image'.$x];
        if($image==NULL){
            null;
            }
            else{
                echo "<img src='$image' class='myimages'>";
                }
                $check++;
                }
                }
                
<img src='' class='myimages'>


 /*$imagesql="INSERT INTO `images` (`s.no`, `name`, `password`, `image1`) VALUES (NULL, '$path', '$password', '$folder');";
        $rusql=mysqli_query($conn,$imagesql);
        ALTER TABLE `images` ADD `image2` VARCHAR NULL AFTER `image1`;
        
         $image=$data['image'.$x];
            echo $image;
            if($image==NULL){
                echo "if run";
                $update="UPDATE `images` SET `image$x`=$folder";
                $updaterun=mysqli_query($conn,$update);
                break;
            }
            else{
                echo "else run";
                null;
            }
            $x++;
        */
-->
