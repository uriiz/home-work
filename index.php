<?php include 'inc/header.php' ?>
<div class="mt-5"></div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" id="post-form" method="post">
                    <fieldset>

                        <div class="form-group">
                            <div class="col-md-12">
                                <input id="name" name="name" type="text" placeholder="Name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <input id="email" name="email" type="email" placeholder="Email" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <input id="title" name="title" type="text" placeholder="Title" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <textarea class="form-control" id="body" name="body" placeholder="Content..." rows="7"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'inc/footer.php' ?>


