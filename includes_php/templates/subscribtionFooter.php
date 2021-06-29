<!-- Footer -->
<footer class="bg-light text-center">
    <div class="container p-4 pb-0">
        <section>
<?php if(isset($_REQUEST['msg']) && $_REQUEST['msg'] == 'success')
{  echo "<div class='alert alert-success'>You successfully subscribed to our newsletter.</div>"; }?>
            <form class="row gy-2 gx-3 align-items-center"
            action="includes_php\phpActions\subscribe.php" method="POST">
                <div class="col-auto">
                    <p class="pt-2">
                    	<br>
                        <strong>Subscribe to our newsletter</strong>
                    </p>
                </div>
                <div class="col-auto">
                    <label class="visually-hidden" for="autoSizingInput" aria-label="Enter your name">Enter your name</label>
                    <input type="text" tabindex="1" class="form-control" id="autoSizingInput" placeholder="Enter your name">
                </div>
                <div class="col-auto">
                    <label class="visually-hidden" for="email" aria-label="Enter your email">Enter your email</label>
                    <input type="email" tabindex="2" class="form-control" id="email" placeholder="Enter your email">
                </div>
                <div class="col-md">
                    <br>
                    <label style="float:left;"><input type="checkbox" name="news" checked>Newsletter</label> <br>
                    <label style="float:left;"><input type="checkbox" name="flash" checked>Newsflash</label>
                </div>
                <div class="col-auto">
                    <button type="submit" name="submit" aria-label="Subscribe to our newsletter button"
                    class="btn btn-primary mb-4" id="SubscribeButton">Subscribe</button>
                </div>
            </form>
        </section>
    </div>  
    <br>    
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        <span class="text-dark"><p>Copyright &copy; 2020 - <?php print date('Y');?>
        RAD Group Project</p></span>
    </div>
</footer>
</body>
</html>
