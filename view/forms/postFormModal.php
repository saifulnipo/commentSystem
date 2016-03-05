<div id="postFormModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Create New Post</h4>
            </div>
            <div class="modal-body">
                <form id="postForm" class="form-horizontal" role="form" data-toggle="validator" method="post" action="index.php">
                    <input type="hidden" name="action" id="action" value="">
                    <input type="hidden" name="post_id" id="post_id" value="">
                    <div class="form-group">
                        <label for="name" class="col-md-2 control-label">Name</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="postName" name="postName" placeholder="Name" value="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-md-2 control-label">Email</label>
                        <div class="col-md-10">
                            <input type="email" class="form-control" id="postEmail" name="postEmail" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message" class="col-md-2 control-label">Post</label>
                        <div class="col-md-10">
                            <textarea class="form-control" rows="4" id="postMessage" name="postMessage" required></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-2"></div>
                        <div class="col-md-10">
                            <input id="newPostSubmitButton" name="newPostSubmit" type="submit" value="Submit Post" class="btn btn-primary">
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>




