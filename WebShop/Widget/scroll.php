<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" />
    <link rel="stylesheet" href="css/TrangChu.css">
</head>
<style>
    
#progress {
    position: fixed;
    bottom: 20px;
    right: 10px;
    width: 70px;
    height: 70px;
    display: none;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    z-index: 9999;
}

#progress.active {
    display: flex;
}

#progress-value {
    background: #fff;
    width: calc(100% - 15px);
    height: calc(100% - 15px);
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: inherit;
    font-size: 22px;
}

</style>
<div id="progress">
    <span id="progress-value">
        <i class="fa-solid fa-arrow-up"></i>
    </span>
</div>

<script>
    window.addEventListener("scroll", function() {
        const progress = document.getElementById("progress");
        const position = window.scrollY;
        let calcHeight =
            document.documentElement.scrollHeight -
            document.documentElement.clientHeight;
        let scrollValue = position / calcHeight * 100;
        console.log(scrollValue);
        if (position > 100) {
            progress.classList.add("active");
            progress.style.background = `conic-gradient(#131921 ${scrollValue}%,#d7d7d7 ${scrollValue}%)`;
        } else {
            progress.classList.remove("active");
        }
    });

    progress.onclick = function() {
        document.documentElement.scrollTop = 0;
    }
</script>