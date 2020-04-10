<form action="/main/update_task" method="post">
    <input type="hidden" name="id" value="<?php echo $data['input']['id'] ?? '';?>">
    <div class="form-group  row <?php echo in_array('name', $data['errors']) ? 'has-error':''?>">
        <label class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10"><input type="text" name="name" class="form-control" value="<?php echo $data['input']['name'] ?? '';?>"></div>
    </div>
    <div class="hr-line-dashed"></div>
    <div class="form-group row <?php echo in_array('email', $data['errors']) ? 'has-error':''?>">
        <label class="col-sm-2 col-form-label">E-mail</label>
        <div class="col-sm-10"><input type="text" name="email" class="form-control" value="<?php echo $data['input']['email'] ?? '';?>">
            <span class="form-text m-b-none">Please, type correct e-mail here.</span>
        </div>
    </div>
    <div class="form-group  row <?php echo in_array('task', $data['errors']) ? 'has-error':''?>">
        <label class="col-sm-2 col-form-label">Task</label>
        <div class="col-sm-10"><textarea name="task" class="form-control h-150"><?php echo $data['input']['task'] ?? '';?></textarea></div>
    </div>
    <div class="form-group  row">
        <label class="col-sm-2 col-form-label">Completed</label>
        <div class="col-sm-10">
            <select class="form-control m-b" name="completed">
                <option value="0" <?php echo isset($data['input']['completed']) && $data['input']['completed']==0 ? 'selected' : '';?>>Task is still uncompleted</option>
                <option value="1" <?php echo isset($data['input']['completed']) && $data['input']['completed']==1 ? 'selected' : '';?>>Task is completed</option>
            </select>
        </div>
    </div>
    <div class="form-group  row">
        <div class="col-sm-12" align="center">

            <input type="submit" value="Send" class="btn btn-info">
            <input type="button" onclick="document.location='/main/';" value="Cancel" name="btn" class="btn btn-warning">
        </div>
    </div>

</form>