<?php $this->load->view('templates/header'); ?>

<div class="container mt-5">
    <h2 class="mt-5" style="font-weight: bold;"><?php echo $question['question']; ?></h2>
    <div class="tags" style="margin-top: 10px;">
        <?php
        $tags = explode(',', $question['tags']);
        foreach ($tags as $tag) {
            echo '<span style="background-color: #2352D8; padding: 5px 10px; margin-right: 5px; border-radius: 5px; display: inline-block;  color: #fff">#' . trim($tag) . '</span>';
        }
        ?>
    </div>

    <div class="answers mt-4">
        <h3>Answers</h3>
        <?php if ($answers) : ?>
            <?php foreach ($answers as $answer) : ?>
                <div class="answer-box">
                    <p><?php echo $answer['answer']; ?></p>
                    <div class="vote-section">
                        <button class="btn btn-outline-primary upvote" data-id="<?php echo $answer['id']; ?>">
                            <i class="fa fa-thumbs-up"></i> <?php echo $answer['upvotes']; ?>
                        </button>
                        <button class="btn btn-outline-secondary downvote" data-id="<?php echo $answer['id']; ?>">
                            <i class="fa fa-thumbs-down"></i> <?php echo $answer['downvotes']; ?>
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>No answers yet. Be the first to answer!</p>
        <?php endif; ?>
    </div>

    <div class="submit-answer mt-4">
        <h3>Submit Your Answer</h3>
        <form action="<?php echo site_url('answers/submit/' . $question['id']); ?>" method="post">
            <div class="form-group">
                <textarea class="form-control" name="answer" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn " style="background-color: #3C6;">Post Answer</button>
        </form>
    </div>
</div>

<?php $this->load->view('templates/footer'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.upvote').on('click', function() {
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

        $('.downvote').on('click', function() {
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