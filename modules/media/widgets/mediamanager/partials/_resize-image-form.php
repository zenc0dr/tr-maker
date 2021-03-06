<script type="text/template" data-control="resize-template">
    <?= Form::open() ?>
        <div class="modal-header">
            <h4 class="modal-title"><?= e(trans('backend::lang.media.resize_image')) ?></h4>
            <button type="button" class="btn-close" data-dismiss="popup"></button>
        </div>
        <div class="modal-body">
            <div class="form-group span-left">
                <label class="form-label"><?= e(trans('backend::lang.media.width')) ?></label>
                <input type="text" class="form-control" name="width" value="" />
            </div>
            <div class="form-group span-right">
                <label class="form-label"><?= e(trans('backend::lang.media.height')) ?></label>
                <input type="text" class="form-control" name="height" value="" />
            </div>
        </div>
        <div class="modal-footer">
            <button
                type="submit"
                class="btn btn-primary">
                <?= e(trans('backend::lang.form.apply')) ?>
            </button>
            <button
                type="button"
                class="btn btn-default"
                data-dismiss="popup">
                <?= e(trans('backend::lang.form.cancel')) ?>
            </button>
        </div>
    </form>
</script>
