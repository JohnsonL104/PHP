<footer class = "footer">
    <div class = "container">
        <p class = "text-muted">
            <?php       
                date_default_timezone_set('UTC');
                $file = basename($_SERVER['PHP_SELF']);
                $mod_date=date("F d Y h:i:s A", filemtime($file));
                echo "File last updated $mod_date UTC";
            ?>
        </p>
        
    </div>
</footer>