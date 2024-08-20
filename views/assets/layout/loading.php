<!-- loading.php -->
<style>
    #loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 9999;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #loading-spinner {
        color: #fff;
        font-size: 10px;
        width: 1em;
        height: 1em;
        border-radius: 50%;
        position: relative;
        text-indent: -9999em;
        animation: mulShdSpin 1.3s infinite linear;
        transform: translateZ(0);
    }

    @keyframes mulShdSpin {
        0%,
        100% {
            box-shadow: 0 -3em 0 0.2em, 
            2em -2em 0 0em, 3em 0 0 -1em, 
            2em 2em 0 -1em, 0 3em 0 -1em, 
            -2em 2em 0 -1em, -3em 0 0 -1em, 
            -2em -2em 0 0;
        }
        12.5% {
            box-shadow: 0 -3em 0 0, 2em -2em 0 0.2em, 
            3em 0 0 0, 2em 2em 0 -1em, 0 3em 0 -1em, 
            -2em 2em 0 -1em, -3em 0 0 -1em, 
            -2em -2em 0 -1em;
        }
        25% {
            box-shadow: 0 -3em 0 -0.5em, 
            2em -2em 0 0, 3em 0 0 0.2em, 
            2em 2em 0 0, 0 3em 0 -1em, 
            -2em 2em 0 -1em, -3em 0 0 -1em, 
            -2em -2em 0 -1em;
        }
        37.5% {
            box-shadow: 0 -3em 0 -1em, 2em -2em 0 -1em,
            3em 0em 0 0, 2em 2em 0 0.2em, 0 3em 0 0em, 
            -2em 2em 0 -1em, -3em 0em 0 -1em, -2em -2em 0 -1em;
        }
        50% {
            box-shadow: 0 -3em 0 -1em, 2em -2em 0 -1em,
            3em 0 0 -1em, 2em 2em 0 0em, 0 3em 0 0.2em, 
            -2em 2em 0 0, -3em 0em 0 -1em, -2em -2em 0 -1em;
        }
        62.5% {
            box-shadow: 0 -3em 0 -1em, 2em -2em 0 -1em,
            3em 0 0 -1em, 2em 2em 0 -1em, 0 3em 0 0, 
            -2em 2em 0 0.2em, -3em 0 0 0, -2em -2em 0 -1em;
        }
        75% {
            box-shadow: 0em -3em 0 -1em, 2em -2em 0 -1em, 
            3em 0em 0 -1em, 2em 2em 0 -1em, 0 3em 0 -1em, 
            -2em 2em 0 0, -3em 0em 0 0.2em, -2em -2em 0 0;
        }
        87.5% {
            box-shadow: 0em -3em 0 0, 2em -2em 0 -1em, 
            3em 0 0 -1em, 2em 2em 0 -1em, 0 3em 0 -1em, 
            -2em 2em 0 0, -3em 0em 0 0, -2em -2em 0 0.2em;
        }
    }
        
</style>

<!-- Loading overlay -->
<div id="loading-overlay" style="display: none;">
    <div id="loading-spinner"></div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('loading-overlay').style.display = 'flex';
   
    setTimeout(function() {
        document.getElementById('loading-overlay').style.display = 'none';
    }, 1000);
});

</script>
