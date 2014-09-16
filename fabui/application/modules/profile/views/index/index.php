<div class="row">
	<div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
		<h1 class="page-title txt-color-blueDark"><i class="fa fa-user"></i> Profile </h1>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">

		<div class="well">

			<ul id="myTab1" class="nav nav-tabs bordered">
				<li class="active">
					<a href="#basic-info" data-toggle="tab"><i class="fa fa-fw fa-lg fa-pencil-square-o"></i>&nbsp;Basic info</a>
				</li>
				<!--
				<li>
					<a href="#password-tab" data-toggle="tab"><i class="fa fa-fw fa-lg fa-key"></i>&nbsp;Password</a>
				</li>
				-->
				<li>
					<a href="#theme-tab" data-toggle="tab"><i class="fa fa-fw fa-lg fa-delicious"></i>&nbsp;Theme</a>
				</li>

			</ul>
			<div id="myTabContent1" class="tab-content padding-10">
				<div class="tab-pane fade in active" id="basic-info">

					<div class="row">

						<div class="col-sm-3">

							<div class="row">
								<div class="col-xs-12 col-md-12">
									<a href="javascript:void(0)" class="thumbnail"> <img id="img-preview" src="<?php echo $_SESSION['user']['avatar'] != '' ? $_SESSION['user']['avatar'] : base_url() . 'application/layout/assets/img/male.png'; ?>" alt=""> </a>
								</div>

							</div>

							<div class="row">

								<div class="col-xs-12">

									<a id="select-image" href="javascript:void(0);" class="btn btn-default">Select image</a>
									&nbsp;
									<a id="remove-image" href="javascript:void(0);" class="btn btn-default">Remove</a>
								</div>

								<input type="file" id="uploadFile" style="display: none">

							</div>

						</div>

						<div class="col-sm-9">

							<form id="basic-info-form" >

								<div class="form-group">

									<label>First name</label>
									<input name="first_name" id="first_name" type="text" value="<?php echo $user['first_name'] ?>" class="form-control">

								</div>

								<div class="form-group">

									<label>Last name</label>
									<input name="last_name" id="last_name" type="text" value="<?php echo $user['last_name'] ?>" class="form-control">

								</div>

								<div class="form-group">

									<label>Email</label>
									<input name="email" id="email" type="email" value="<?php echo $user['email'] ?>" class="form-control">

								</div>

								<hr>

							</form>

						</div>
					</div>

				</div>
				<div class="tab-pane fade" id="password-tab">

				</div>

				<div class="tab-pane fade" id="theme-tab">

					<div class="row">

						<div class="col-sm-12">
							<fieldset>
								<div class="form-group">

									<label>Theme skin</label>
									<div class="radio">
										<label>
											<input type="radio" class="radiobox style-0" <?php echo $_SESSION['user']['theme-skin']=='smart-style-0' ? 'checked="checked"' : '' ?>
											name="theme_skin" value="smart-style-0">
											<span> Default </span> </label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" class="radiobox style-0" <?php echo $_SESSION['user']['theme-skin']=='smart-style-1' ? 'checked="checked"' : '' ?>
											name="theme_skin" value="smart-style-1">
											<span> Dark Elegance </span> </label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" class="radiobox style-0" <?php echo $_SESSION['user']['theme-skin']=='smart-style-2' ? 'checked="checked"' : '' ?>
											name="theme_skin" value="smart-style-2">
											<span> Ultra Light </span> </label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" class="radiobox style-0" <?php echo $_SESSION['user']['theme-skin']=='smart-style-3' ? 'checked="checked"' : '' ?>
											name="theme_skin" value="smart-style-3">
											<span> Google Skin </span> </label>
									</div>
								</div>
							</fieldset>
						</div>
					</div>
				</div>

				<div class="form-actions">
					<div class="row">
						<div class="col-md-12">

							<button class="btn btn-primary" id="save-button">
								<i class="fa fa-save"></i>&nbsp;Save
							</button>
						</div>
					</div>
				</div>

			</div>

		</div>
	</div>
