<!-- /.content -->
<link type="text/css" rel="stylesheet" href="css/element.css" />
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/Action.js"></script>
<script type="text/javascript" src="js/calculate.js"></script>

<section class="content-header">
    <h1>Import User</h1>
</section>


<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <p>
                        <?= $success ?>
                    </p>
                    <p class="errormessage">
                        <?= $exist ?>
                    </p>
                </div>
                <div class="box-header">
                    <form method="post" action="?d=manage/importUser" enctype="multipart/form-data">
                        <button type="submit" class="btn btn-primary" name="btnImport">Import User</button>
                    </form>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="box-body pad table-responsive">
                            <form method="post" id="editable" action="?d=manage/user">
                                <table id="example3" class="table table-bordered table-hover beautified editable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>User ID</th>
                                            <th>username</th>
                                            <th>empid</th>
                                            <th>firstName</th>
                                            <th>LastName</th>
                                            <th>roleid</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $arr = UserList($TokenKey, "1", $api_url);
                                        $i = 1;
                                        foreach ($arr as $data) {

                                            ?>
                                            <tr>


                                                <td>
                                                    <?= $i ?>
                                                </td>
                                                <td>
                                                    <?= $data['userID'] ?>
                                                </td>
                                                <td>
                                                    <?= $data['username'] ?>
                                                </td>
                                                <td>
                                                    <?= $data['empid'] ?>
                                                </td>
                                                <td>
                                                    <?= $data['firstName'] ?>
                                                </td>
                                                <td>
                                                    <?= $data['LastName'] ?>
                                                </td>
                                                <td>
                                                    <?= $data['roleid'] ?>
                                                </td>

                                            </tr>
                                            <?php
                                            $i++;
                                        } ?>
                                    </tbody>
                                </table>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</div>