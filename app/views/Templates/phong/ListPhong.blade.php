<div class="panel panel-primary">
    <div class="panel-heading">
        <span class="glyphicon glyphicon-info-sign"></span> Chi tiết phòng máy
    </div>
    <div class="panel-body" style="height: 600px; overflow: auto;">

        <table id="table1" class="table table-hover">
            <thead>
            <tr>
                <td>Số thứ tự</td>
                <td>Mã Phòng</td>
                <td>Tên Phòng</td>
                <td>Số máy tính</td>
            </tr>
            </thead>
            <tbody>
                @include('Templates.phong.ListPhong_InListPhong')
            </tbody>
        </table>

    </div>
    <script>
        var updatephong = function (data) {
            $idphong = data.substring(2, data.length);
            $tenphong = $("#e1-" + $idphong).val();
            $chuthich = $("#e2-" + $idphong).val();
            $somay = $("#e3-" + $idphong).val();
            $.ajax({
                type: "POST",
                url: "addphong.php",
                data: {
                    type: 'updatephong',
                    data: $idphong + ";" + $tenphong + ";" + $chuthich + ";" + $somay
                }
            }).done(function (msg) {
                alert(msg);
                location.reload();
            })
        }
    </script>
    <div class="panel-footer">
        <div class="row">
            <div class="col-md-12"><?php
                if ($classuser == 100) {
                    echo('            <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal1">
                Thêm phòng
            </button>
            <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal2" style="margin-right: 10px;">
                Xóa phòng
            </button>');
                }
                ?>

            </div>

            <!-- Modal 1-->
            <div class="modal fade" id="myModal1" tabindex="-1" role="dialog"
                 aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Thêm phòng</h4>
                        </div>
                        <form action="addphong.php" method="POST">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group"><label for="">Tên phòng</label><input
                                                    name="tenphong" type="text" class="form-control"
                                                    placeholder="Nhập tên phòng"></div>
                                        <div class="form-group"><label for="">Chú thích</label><input
                                                    name="chuthich" type="text" class="form-control"
                                                    placeholder="Nhập chú thích"></div>
                                        <div class="form-group"><label for="">Số lượng máy</label><input
                                                    name="somay" type="text" class="form-control"
                                                    placeholder="Nhập số máy trong 1 phòng"></div>

                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Hủy
                                    bỏ
                                </button>
                                <button id="luuthaydoi" type="submit" class="btn btn-primary">Lưu thay
                                    đổi
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal 2-->
            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog"
                 aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Xóa phòng</h4>
                        </div>
                        <div class="modal-body">
                            <?php
                            echo("<div class=\"row\">");
                            $res = sql_query("select * from qlphong");
                            $i = 1;
                            if (mysql_num_rows($res) > 0) {
                                while ($arr = mysql_fetch_assoc($res)) {
                                    echo("<div class=\"col-md-3\">
                                    <div class=\"checkbox\" ><label><input type=\"checkbox\" id=\"id-$arr[autonum]\">Phòng " . $i++ . " - $arr[tenphong]</label></div>
                                </div>
                                ");
                                }
                            }
                            echo("</div>"); ?>
                            <div class="row">
                                <div class="col-md-12" id="numchecked" style="color: red">
                                    <script>
                                        var countChecked = function () {
                                            var n = $("input:checked").length;
                                            $("#numchecked").text(n + " đã được chọn!!!");
                                        };
                                        $("input[type=checkbox]").on("click", countChecked);
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-default" data-dismiss="modal">Hủy bỏ
                            </button>
                            <button id="xoaphong" name="xoaphong" type="button" class="btn btn-primary">
                                Xóa phòng đã chọn
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        var delphong = function () {
            $("input:checked").each(function ($key, $element) {
//                alert($($element).attr("id"));

                $.ajax({
                    type: "POST",
                    url: "delphong.php",
                    data: {type: "delphong", phongno: $($element).attr("id")}
                })
                        .done(function (msg) {
                            //alert("Đã xoá phòng thứ "+$key+1+" được chọn!!!"+msg);
                        });
            });
            alert("Đã xoá!!");
            location.reload();
        };
        $("#xoaphong").click(delphong);
    </script>
</div>