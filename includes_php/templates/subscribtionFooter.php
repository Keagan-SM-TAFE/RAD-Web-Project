<!-- Footer -->
<footer class="bg-light text-center">
        <div class="container p-4 pb-0">
            <section class="">
            <form action="">
                <div class="row d-flex justify-content-center">
                <div class="col-auto">
                    <p class="pt-2">
                        <strong>Subscribe to our newsletter</strong>
                    </p>
                </div>
                <div class="col-md-5 col-12">
                    <div class="form-outline mb-4">
                        <input type="email" class="form-control form-control-lg" id="newsletterEmail"
                        placeholder="Enter Email" name="newsletterEmail" value="<?php echo $newsletterEmail; ?>">
                    </div>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-4">Subscribe</button>
                </div>
                </div>
            </form>
            </section>
        </div>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                <span class="text-dark"><p>Copyright &copy; 2020 - <?php print date('Y');?> 
                RAD Group Project</p></span>
        </div>
    </footer>
</body>
</html>