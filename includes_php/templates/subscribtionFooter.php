<!-- Footer -->
<footer class="bg-light text-center">
        <div class="container p-4 pb-0">
            <section class="">
            <form action="includes_php\phpActions\subscribe.php">
                <div class="row d-flex justify-content-center">
                <div class="col-auto">
                    <p class="pt-2">
                        <strong>Subscribe to our newsletter</strong>
                    </p>
                </div>
                <div class="col-md-5 col-12">
                    <div class="row g-3">
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInputGrid">
                                <label for="floatingInputGrid">Name</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="floatingInputGrid">
                                <label for="floatingInputGrid">Email address</label>
                            </div>
                        </div>
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