<?php $this->load->view('templates/header'); ?>

<div class="container mt-5">
    <div class="question-box">
        <h2><?php echo $question['question']; ?></h2>
        <div class="actions">
            <div class="vote-section">
                <span class="vote-count">
                    <i class="fa fa-thumbs-up"></i> <?php echo isset($question['upvotes']) ? $question['upvotes'] : 0; ?>
                </span>
                <span class="vote-count">
                    <i class="fa fa-thumbs-down"></i> <?php echo isset($question['downvotes']) ? $question['downvotes'] : 0; ?>
                </span>
            </div>
            <div class="tags">
                <button class="btn btn-info btn-sm">#Python</button>
                <button class="btn btn-info btn-sm">#Algorithm</button>
            </div>
        </div>
        <button type="button" class="btn btn-success mt-3" data-toggle="modal" data-target="#answerModal">
            Answer
        </button>
    </div>

    <?php foreach ($answers as $answer) : ?>
        <div class="answer-box">
            <p><?php echo $answer['answer']; ?></p>
            <div class="actions">
                <div class="vote-section">
                    <button class="btn btn-outline-primary upvote-answer" data-id="<?php echo $answer['id']; ?>">
                        <i class="fa fa-thumbs-up"></i> <?php echo isset($answer['upvotes']) ? $answer['upvotes'] : 0; ?>
                    </button>
                    <button class="btn btn-outline-secondary downvote-answer" data-id="<?php echo $answer['id']; ?>">
                        <i class="fa fa-thumbs-down"></i> <?php echo isset($answer['downvotes']) ? $answer['downvotes'] : 0; ?>
                    </button>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<!-- Answer Modal -->
<div class="modal fade" id="answerModal" tabindex="-1" role="dialog" aria-labelledby="answerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="answerModalLabel">Answer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo site_url('answers/submit'); ?>" method="post">
                    <input type="hidden" name="question_id" value="<?php echo $question['id']; ?>">
                    <div class="form-group">
                        <label for="answer">Type Your Answer Here</label>
                        <textarea class="form-control" id="answer" name="answer" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Post Answer</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('templates/footer'); ?>

<script>
    $(document).ready(function() {
        $('.upvote-answer').on('click', function() {
            var answer_id = $(this).data('id');
            $.ajax({
                url: '<?php echo site_url('answers/upvote'); ?>/' + answer_id,
                method: 'POST',
                success: function(response) {
                    response = JSON.parse(response);
                    if (response.status == 'success') {
                        location.reload();
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });

        $('.downvote-answer').on('click', function() {
            var answer_id = $(this).data('id');
            $.ajax({
                url: '<?php echo site_url('answers/downvote'); ?>/' + answer_id,
                method: 'POST',
                success: function(response) {
                    response = JSON.parse(response);
                    if (response.status == 'success') {
                        location.reload();
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>