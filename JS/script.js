
const videos = document.querySelectorAll('.video');
if(videos.length !== 0)
    videos[0].children[0].play();
else
    window.location = 'upload.php';
const videosapp = document.querySelector('.videos-app');
let topvideosapp;
videosapp.onscroll = function(){
    topvideosapp = videosapp.scrollTop;
    if(topvideosapp%650 === 0){
        videos.forEach(function(video){
            if(topvideosapp === video.offsetTop){
                video.children[0].play();
                if(video.nextElementSibling)
                    video.nextElementSibling.children[0].pause();
                if(video.previousElementSibling)
                    video.previousElementSibling.children[0].pause();
            }
        });
    }
}
const videos2 = document.querySelectorAll('video')
videos2.forEach(function (video){
    video.addEventListener('click',function(){
        if(this.paused)
            this.play();
        else    
            this.pause();
    })
})

const upbtn = document.querySelectorAll('.upimg');
upbtn.forEach(function (e){
    e.onclick = function(){
        window.location = "upload.php";
    }
})


