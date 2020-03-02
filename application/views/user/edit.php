<div class="container-fluid">

    <h6 class="mb-5 text-center text-bayangan text-uppercase">Edit Your Profile</h6>



    <div class="row">


        <div class="col-lg-9">


            <?= form_open_multipart('user/edit'); ?>


            <div class="form-group row ">
                <label for="inputEmail3" class="col-sm-2 col-form-label mb-3">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" value="<?= $nama['email']; ?>" readonly name="email">

                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label mb-3 ">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" value="<?= $nama['name']; ?>" name="name">
                    <?= form_error('name', '<div class="text-danger">', '</div>'); ?>
                </div>
            </div>

            <div class="form-group row">


                <div class="col-sm-2">Gambar</div>

                <div class="col-sm-10">

                    <div class="row">

                        <div class="col-sm-3">
                            <img src=" <?= base_url('asset/img/') . $nama['img']; ?> " class="img-thumbnail">
                            <small class="text-danger">Recomended jpg,png,jpeg</small> <br>
                            <small class="text-danger">Size Max 1 MB</small>
                        </div>

                        <div class="col-sm-9">

                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="image">

                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="form-group row justify-content-end ">
                <div class="col-sm-10 ">
                    <button type="submit" class="btn btn-primary">Edit My Profile</button>
                </div>
            </div>

            </form>

        </div>


    </div>






</div>