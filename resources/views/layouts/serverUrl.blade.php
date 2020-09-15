<style>
    #setting-btn{
            color: #818080; 
            cursor: pointer;
        }
        #setting-btn:hover {
            color: #5a5a5a;
        }
        #setting-btn:active {
            color: #161616;
        }
</style>
<!-- Button trigger modal -->
<i class="fa fa-3x fa-cog offset-0 col-1 offset-md-1" id="setting-btn"aria-hidden="true" data-toggle="modal" data-target="#setServerUrl">
</i>

<!-- Modal -->
<div class="modal fade" id="setServerUrl" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">Set server URL</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                </div>
            <form method="POST" onsubmit="submitServerUrl(this);">
                @csrf
                <div class="modal-body">
                    <div class="container-fluid">
                            <div class="form-group row">
                            <label for="serverUrl col-4">Server URL : </label>
                            <input type="text" class="form-control" name="serverUrl" id="serverUrl" placeholder="http://www.aaaa.bb/cc">
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function submitServerUrl(form) {
            event.preventDefault();
            let formData = new FormData(form);
            axios.post('/prediction/serverUrl',formData)
                .then(function (response) {
                    $('#setServerUrl').modal('hide');
                    console.log(response);
                })
                .catch(function (error) {
                    $('#setServerUrl').modal('hide');
                    console.log(error.response.data.message);
                });
        };
</script>