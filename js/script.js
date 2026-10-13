var seconds = 300; 
var countdownDisplay = document.getElementById("countdown");

// عداد الوقت
var x = setInterval(function() {
    if (seconds > 0) {
        seconds--;
        var d = Math.floor(seconds / (24 * 3600));
        var h = Math.floor((seconds % (24 * 3600)) / 3600);
        var m = Math.floor((seconds % 3600) / 60);
        var s = seconds % 60;
        countdownDisplay.innerHTML = d + " يوم و " + h + " ساعة و " + m + " دقيقة و " + s + " ثانية";
    } else {
        clearInterval(x);
        countdownDisplay.innerHTML = "انتهى الوقت! جاري السحب...";
        showWinner(); 
    }
}, 1000);

function showWinner() {
    const modal = document.getElementById("modal");
    const loader = document.getElementById("loader");
    const winnerDetails = document.getElementById("winner-details");

    modal.style.display = "block";
    loader.style.display = "block";
    winnerDetails.style.display = "none";


    setTimeout(function() {
        loader.style.display = "none";
        winnerDetails.style.display = "block";


        var end = Date.now() + (2 * 1000); 

        (function frame() {
            // إطلاق مفرقعات من اليمين
            confetti({
                particleCount: 7,
                angle: 60,
                spread: 55,
                origin: { x: 0 },
                zIndex: 10001 
            });
           
            confetti({
                particleCount: 7,
                angle: 120,
                spread: 55,
                origin: { x: 1 },
                zIndex: 10001
            });

            if (Date.now() < end) {
                requestAnimationFrame(frame);
            }
        }());

        confetti({
            particleCount: 100,
            spread: 70,
            origin: { y: 0.6 },
            zIndex: 10001
        });

    }, 2500); 
}

document.getElementById("winner-btn").onclick = showWinner;