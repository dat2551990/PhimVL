﻿
					<!-- <script>
						var fileName;
						function _(el) {
							return document.getElementById(el);
						}

						function uploadFile() {
							var file = _("file1").files[0];
							//alert(file.name+" | "+file.size+" | "+file.type);
							if (file != null) {
								var formdata = new FormData();
								formdata.append("file1", file);
								var ajax = new XMLHttpRequest();
								ajax.upload.addEventListener("progress", progressHandler, false);
								ajax.addEventListener("load", completeHandler, false);
								ajax.addEventListener("error", errorHandler, false);
								ajax.addEventListener("abort", abortHandler, false);
								ajax.open("POST", "../admin/include/file_upload_parser.php");
								ajax.send(formdata);
							}
						}

						function progressHandler(event) {
							_("loaded_n_total").innerHTML = "Uploaded " + event.loaded + " bytes of " + event.total;
							var percent = (event.loaded / event.total) * 100;
							_("progressBar").value = Math.round(percent);
							_("status").innerHTML = Math.round(percent) + "% uploaded... please wait";

						}

						function completeHandler(event) {
							fileName = event.target.responseText;
							if(fileName == "Không")
							{
								_("status").innerHTML = "Upload " + event.target.responseText + " Thành Công";
								
							}
							//alert(fileName);
							else if(fileName == "Có Rồi")
							{
								_("status").innerHTML = "File Upload Đã " + event.target.responseText + " Upload Không Thành Công";
							}
							else{
								_("link").value = fileName;
								_("status").innerHTML = "Upload " + event.target.responseText + " Thành Công";
							}
							
							_("progressBar").value = 100;
						}

						function errorHandler(event) {
							_("status").innerHTML = "Upload Failed";
						}

						function abortHandler(event) {
							_("status").innerHTML = "Upload Aborted";
						}
					</script> -->
					<?php
					$querySLC = "select * from film_cataloge order by film_cataloge_id asc";
					$resultSLC = mysql_query($querySLC);
					$querySLCon = "select * from film_country order by film_country_id asc";
					$resultSLCon = mysql_query($querySLCon);
					$querySLNSX = "select * from film_nhasx order by film_nhasx_id asc";
					$resultSLNSX = mysql_query($querySLNSX);
					?>
					<div class="tab-pane fade" id="addFilmLe">
					<h1 class="text-center text-danger">Thông Tin Phim Lẻ</h1>
					
					<div class="well">
						<!-- <form class="form-horizontal" id="upload_form" enctype="multipart/form-data" method="post">
  							<div class="form-group">
  								<label class="control-label col-md-2">Upload Phim</label>
  								<div class="col-md-8">
  									<input accept="video/*" class="form-control required" type="file" name="file1" id="file1">
  									<h4 class="text-danger"><strong>KHÔNG</strong> Chọn File Upload Có Unicode</h4>
  								</div>
  							</div>
  							<div class="form-group">
  								<label class="control-label col-md-2"></label>
  								<div class="col-md-8">
  									<input type="button" id="uploadButton" class="btn btn-primary" value="Upload File" onclick="uploadFile()">
  								</div>
  							</div>
  							<div class="form-group">
  								<div class="col-md-offset-2 col-md-8">
  									<progress id="progressBar" value="0" max="100" style="width:100%;"></progress>
  									<h3 class="text-success" id="status"></h3>
  									<p class="text-info" id="loaded_n_total"></p>
  								</div>
  							</div>
						</form> -->
						
						<form method="POST" action="addEditDelete/beginUploadLe.php" class="form-horizontal" id="management">
							<!-- <div class="form-group">
								<label class="control-label col-md-2">Link Phim</label>
								<div class="col-md-8">
								<input type="text" readonly="readonly" id="link" name="link" class="form-control required" value="" placeholder="Bạn Phải Upload Để Lưu Link Phim"  />
								</div>
								<div class="col-md-offset-2"></div>
							</div> -->
							<div class="form-group">
								<label class="control-label col-md-2">Tên Phim Lẻ</label>
								<div class="col-md-8">
								<input type="text" name="tenFilmLe" class="form-control required" value="" placeholder="Nhập Tên Tiếng Anh"  />
								</div>
								<div class="col-md-offset-2"></div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2">Tên Phim(Tiếng Việt)</label>
								<div class="col-md-8">
								<input type="text" name="tenFilmLeVi" class="form-control required" value="" placeholder="Nhập Tên Tiếng Việt"  />
								</div>
								<div class="col-md-offset-2"></div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2">Năm Sản Xuất</label>
								<div class="col-md-8">
								<select name="namSX" class="form-control">
									<?php
									for ($i=1800; $i <= date('Y'); $i++) { 
										if($i==date('Y')){
											?>
											<option selected="" value="<?php echo($i); ?>"><?php echo($i); ?></option>
											<?php
											}
											else {
											?>
											<option value="<?php echo($i); ?>"><?php echo($i); ?></option>
											<?php
											}
											}
									?>
								</select>
								</div>
								<div class="col-md-offset-2"></div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2">Thể Loại 1</label>
								<div class="col-md-8">
									<select name="theLoai1" class="form-control">
										<?php
										while($rowC = mysql_fetch_array($resultSLC))
										{
										?>
										<option value="<?php echo($rowC['0']); ?>" ><?php echo($rowC['1']); ?></option>
										<?php
										}
										?>
									</select>
								</div>
								<div class="col-md-offset-2"></div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2">Thể Loại 2</label>
								<div class="col-md-8">
									<select name="theLoai2" class="form-control">
										<?php
										mysql_data_seek($resultSLC, 0);
										while($rowC = mysql_fetch_array($resultSLC))
										{
										?>
										<option value="<?php echo($rowC['0']); ?>" ><?php echo($rowC['1']); ?></option>
										<?php
										}
										?>
									</select>
								</div>
								<div class="col-md-offset-2"></div>
							</div>						
							<div class="form-group">
								<label class="control-label col-md-2">Thể Loại 3</label>
								<div class="col-md-8">
									<select name="theLoai3" class="form-control">
										<?php
										mysql_data_seek($resultSLC, 0);
										while($rowC = mysql_fetch_array($resultSLC))
										{
										?>
										<option value="<?php echo($rowC['0']); ?>" ><?php echo($rowC['1']); ?></option>
										<?php
										}
										?>
									</select>
								</div>
								<div class="col-md-offset-2"></div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2">Nước Sản Xuất</label>
								<div class="col-md-8">
									<select name="nuocSX" class="form-control">
										<?php
										
										while($rowCon = mysql_fetch_array($resultSLCon))
										{
										?>
										<option value="<?php echo($rowCon['0']); ?>" ><?php echo($rowCon['1']); ?></option>
										<?php
										}
										?>
									</select>
								</div>
								<div class="col-md-offset-2"></div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2">Nhà Sản Xuất</label>
								<div class="col-md-8">
									<select name="nhaSX" class="form-control">
										<?php
										
										while($rowNSX = mysql_fetch_array($resultSLNSX))
										{
										?>
										<option value="<?php echo($rowNSX['0']); ?>" ><?php echo($rowNSX['1']); ?></option>
										<?php
										}
										?>
									</select>
								</div>
								<div class="col-md-offset-2"></div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2">Nội Dung</label>
								<div class="col-md-8">
									<textarea name="noiDung" id="editor" class="required"></textarea>
								</div>
								<div class="col-md-offset-2"></div>
							</div>
							<!-- <div class="form-group">
								<label class="control-label col-md-2">Hình Avatar</label>
								<div class="col-md-8">
								<input type="text" name="avatar" class="form-control url required" value="" placeholder="Nhập URL Hình"  />
								</div>
								<div class="col-md-offset-2"></div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2">Hình Cover</label>
								<div class="col-md-8">
								<input type="text" name="cover" class="form-control url required" value="" placeholder="Nhập URL Hình"  />
								</div>
								<div class="col-md-offset-2"></div>
							</div> -->
							<div class="form-group">
								<label class="control-label col-md-2">Tên Đạo Diễn</label>
								<div class="col-md-8">
								<input type="text" name="tenDaoDien" class="form-control required" minlength="3" value="" placeholder="Nhập Tên Đạo Diễn"  />
								</div>
								<div class="col-md-offset-2"></div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2">Tên Diễn Viên</label>
								<div class="col-md-8">
								<input type="text" name="tenDienVien" class="form-control required" minlength="3" value="" placeholder="Nhập Tên Các Diễn Viên"  />
								</div>
								<div class="col-md-offset-2"></div>
							</div>
							
							<div class="form-group">
								<div class="col-md-offset-2 col-md-8">
									<div class="btn-group">
										<a href="#tableFilmLe" data-toggle="tab" class="btn btn-info text-center">Hủy</a>
									</div>
									
									<div class="btn-group">
										<button type="submit" class="btn btn-default">Chọn File Upload</button>
									</div>
									
									<div class="btn-group">
										<button type="reset" class="btn btn-warning">Làm Tươi Form</button>
									</div>
								</div>
							</div>
						</form>
						
					</div>
				</div>
				<div class="tab-pane active fade in" id="tableFilmLe">
					<?php
					$query = "SELECT `film_le_id`,`film_le_name`,`film_le_name_vi`,`film_le_namsx`,
					B.film_cataloge_name,C.film_cataloge_name,D.film_cataloge_name,E.film_country_name,F.film_nhasx_name,
					`film_le_avatar`,`film_le_cover`,`film_le_daodien`,`film_le_dienvien`,`film_le_link`,`film_le_postdate`,`film_le_viewed`,
					`film_le_rate` FROM film_le A,film_cataloge B,film_cataloge C,film_cataloge D,film_country E,film_nhasx F 
					WHERE A.film_le_cataloge_id_first = B.film_cataloge_id and A.film_le_cataloge_id_second = C.film_cataloge_id and
					 A.film_le_cataloge_id_third = D.film_cataloge_id and A.film_le_country_id = E.film_country_id and
					  A.film_le_nhasx_id = F.film_nhasx_id";
					$result = mysql_query($query);

					mysql_close($link);
					?>
					<h1 class="text-danger">Bảng Dữ Liệu Phim Lẻ</h1>
					<div class="btn-group">
						<a href="#addFilmLe" data-transition="flow" data-toggle="tab" class="btn btn-info">Upload Phim Lẻ</a>
					</div>
					<div class="btn-group">
						<a href="index-admin.php?changePage=8" class="btn btn-default">Làm Tươi Trang</a>
					</div>
					<div class="btn-group">
						<input placeholder="Tìm Kiếm..." type="search" name="search" class="form-control" value="" id="id_search" />
					</div>
					<div class="btn-group">
						<span class="loading text-primary">Loading...</span>
					</div>
					<hr id="Five" />
					<div id="tableFive" class="table-responsive">
						<table class="table table-striped table-hover">
							<thead style="white-space: nowrap;">
								<tr>
									<th class="lead">STT</th>
									<th class="lead">ID Phim</th>
									<th class="lead">Tên Phim</th>
									<th class="lead">Tên Tiếng Việt</th>
									<th class="lead">Năm SX</th>
									<th class="lead">Thể Loại</th>
									<!-- <th class="lead">Nước</th>
									<th class="lead">Nhà SX</th>
									<th class="lead">Ảnh Avatar</th>
									<th class="lead">Ảnh Cover</th>
									<th class="lead">Đạo Diễn</th>
									<th class="lead">Diễn Viên</th>
									<th class="lead">Link Phim</th>
									<th class="lead">Ngày Đăng</th>
									<th class="lead">Lượt View</th>
									<th class="lead">Rating</th> -->
									<th>&nbsp;</th>
								</tr>
								
							</thead>
							<tbody style="white-space: nowrap;">
								<?php
								$i = 1;
								if($result){
								while ($row = mysql_fetch_array($result)) {

								?>
								<tr> 
									<!-- <script>$('[data-toggle="tooltip"]').tooltip({'placement': 'top'});</script> -->
									<td><?php echo($i++); ?></td>
									<td><?php echo($row['0'])?></td>
									<td><?php echo($row['1']); ?></td>
									<td><?php echo($row['2']); ?></td>
									<td><?php echo($row['3']); ?></td>
									<td><?php echo($row['4'] . " | " . $row['5'] . " | " . $row['6']); ?></td>
									<td style="display: none;"><?php echo($row['7']); ?></td>
									<td style="display: none;"><?php echo($row['8']); ?></td>
									<td style="display: none;"><?php echo($row['9']); ?></td>
									<td style="display: none;"><?php echo($row['10']); ?></td>
									<td style="display: none;"><?php echo($row['11']); ?></td>
									<td style="display: none;"><?php echo($row['12']); ?></td>
									<td style="display: none;"><?php echo($row['13']); ?></td>
									<td style="display: none;"><?php echo($row['14']); ?></td>
									<td style="display: none;"><?php echo($row['15']); ?></td>
									<td style="display: none;"><?php echo($row['16']); ?></td>
									<td>
										<a data-toggle="modal" role="button" href="<?php echo("#detail".$i); ?>" data-target="<?php echo("#detail".$i); ?>" data-remote="false"> Chi Tiết </a>
										&nbsp;&nbsp;
										<a href="addEditDelete/editOneFilmLe.php?filmLeID=<?php echo($row['0']); ?>">Sửa</a>
										&nbsp;&nbsp;
										<a href="addEditDelete/deleteOneFilmLe.php?filmLeID=<?php echo($row['0']); ?>&filmLeName=<?php echo($row['1']); ?>&link=<?php echo($row['13']); ?>&cover=<?php echo($row['10']); ?>&avatar=<?php echo($row['9']); ?>">Xóa</a>
									</td>
								</tr>
								<div class="modal fade" id="<?php echo("detail".$i); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  									<div class="modal-dialog">
    									<div class="modal-content">
      										<div class="modal-header">
        										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        										<h4 class="modal-title text-primary" id="myModalLabel"><strong>Thông Tin Chi Tiết Phim</strong></h4>
      										</div>
      										<div class="modal-body">
      											<div class="row">
      												<label class="col-md-3">ID Phim:</label>
      												<div class="col-md-9"><?php echo($row['0']); ?></div>
      											</div>
      											
      											<div class="row">
      												<label class="col-md-3">Tên Phim:</label>
      												<div class="col-md-9"><?php echo($row['1']); ?></div>
      											</div>
      											
      											<div class="row">
      												<label class="col-md-3">Tên Tiếng Việt:</label>
      												<div class="col-md-9"><?php echo($row['2']); ?></div>
      											</div>
      											
      											<div class="row">
      												<label class="col-md-3">Năm Sản Xuất:</label>
      												<div class="col-md-9"><?php echo($row['3']); ?></div>
      											</div>
      											
      											<div class="row">
      												<label class="col-md-3">Thể Loại:</label>
      												<div class="col-md-9"><?php echo($row['4'].", "); ?><?php echo($row['5'].", "); ?><?php echo($row['6']); ?></div>
      											</div>
      											
      											<div class="row">
      												<label class="col-md-3">Nước:</label>
      												<div class="col-md-9"><?php echo($row['7']); ?></div>
      											</div>
      											
      											<div class="row">
      												<label class="col-md-3">Nhà Sản Xuất:</label>
      												<div class="col-md-9"><?php echo($row['8']); ?></div>
      											</div>
      											<hr />
      											<div class="row">
      												<label class="col-md-3">Ảnh Avatar:</label>
      												<div class="col-md-9"><img width="60" height="90" src="../admin/upload/hinhPhimAvatar/<?php echo($row['9']); ?>"/></div>
      											</div>
      											<hr />
      											<div class="row">
      												<label class="col-md-3">Ảnh Cover:</label>
      												<div class="col-md-9"><img width="100" height="60" src="../admin/upload/hinhPhimCover/<?php echo($row['10']); ?>" /></div>
      											</div>
      											<hr />
      											<div class="row">
      												<label class="col-md-3">Đạo Diễn:</label>
      												<div class="col-md-9"><?php echo($row['11']); ?></div>
      											</div>
      											
      											<div class="row">
      												<label class="col-md-3">Diễn Viên:</label>
      												<div class="col-md-9"><?php echo($row['12']); ?></div>
      											</div>
      											
      											<div class="row">
      												<label class="col-md-3">Ngày Đăng:</label>
      												<div class="col-md-9"><?php echo($row['14']." (<strong>yyyy/MM/dd</strong>)"); ?></div>
      											</div>
      											
      											<div class="row">
      												<label class="col-md-3">Lượt View:</label>
      												<div class="col-md-9"><?php echo($row['15']); ?></div>
      											</div>
      											
      											<div class="row">
      												<label class="col-md-3">Rating:</label>
      												<div class="col-md-9"><?php echo($row['16']); ?></div>
      											</div>
      											
     										</div>
      										<div class="modal-footer">
        										<!-- <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button> -->
      										</div>
    									</div>
  									</div>
								</div>
								
								<?php
								}
								}
								?>
							</tbody>
						</table>
					</div>
					<hr />
				</div>
				