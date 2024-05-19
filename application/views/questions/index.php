<?php $this->load->view('templates/header'); ?>

<div class="container mt-10">
    <h2 class="mt-10">Questions</h2>
    <button type="button" class="btn btn-primary custom-btn" data-toggle="modal" data-target="#askQuestionModal">
        Ask Question
    </button>

</div>

<!-- Modal -->
<div class="modal fade" id="askQuestionModal" tabindex="-1" role="dialog" aria-labelledby="askQuestionModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="askQuestionModalLabel">Question</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo site_url('questions/submit'); ?>" method="post">
                    <div class="form-group">
                        <label for="question">Type Your Question Here</label>
                        <textarea class="form-control" id="question" name="question" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>



<?php foreach ($questions as $question) : ?>
    <div class="question-box">
        <a href="<?php echo site_url('answers/index/' . $question['id']); ?>">
            <p><?php echo $question['question']; ?></p>
        </a>
        <div class="actions">
            <div class="vote-section">
                <button class="btn btn-outline-primary upvote" data-id="<?php echo $question['id']; ?>">
                    <i class="fa fa-thumbs-up"></i> <?php echo $question['upvotes']; ?>
                </button>
                <button class="btn btn-outline-secondary downvote" data-id="<?php echo $question['id']; ?>">
                    <i class="fa fa-thumbs-down"></i> <?php echo $question['downvotes']; ?>
                </button>
            </div>
            <div class="tags">
                <button class="btn btn-info btn-sm"> <?php echo $question['created_at']; ?></button>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php $this->load->view('templates/footer'); ?>

<script>
    $(document).ready(function() {
        $('.upvote').on('click', function() {
            var question_id = $(this).data('id');
            $.ajax({
                url: '<?php echo site_url('questions/upvote'); ?>/' + question_id,
                method: 'POST',
                success: function(response) {
                    response = JSON.parse(response);
                    if (response.status == 'success') {
                        location.reload();
                    }
                }
            });
        });

        $('.downvote').on('click', function() {
            var question_id = $(this).data('id');
            $.ajax({
                url: '<?php echo site_url('questions/downvote'); ?>/' + question_id,
                method: 'POST',
                success: function(response) {
                    response = JSON.parse(response);
                    if (response.status == 'success') {
                        location.reload();
                    }
                }
            });
        });
    });
</script>