<!-- Nút Like/Unlike -->
<button class="like-button fw-light nav-link fs-6" data-idea-id="{{ $idea->id }}">
    @if (Auth::user()->likeidea($idea))
        <span class="fas fa-heart me-1"></span>
        <span id="likes-count-{{ $idea->id }}"> {{ $idea->likes_count }}</span>
    @else
        <span class="far fa-heart me-1"></span>
        <span id="likes-count-{{ $idea->id }}">{{ $idea->likes_count }}</span>
    @endif
</button>

{{-- <!-- jQuery AJAX cho Nút Like -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
<script>
    $(document).ready(function() {
        $('.like-button').off('click').on('click', function() {
            const ideaId = $(this).data('idea-id');
            const button = $(this);
            const likeIcon = button.find('.fa-heart');
            const likesCount = button.find(`#likes-count-${ideaId}`);
            $.ajax({
                url: `/ideas/${ideaId}/toggle-like`,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    // Cập nhật text nút và đếm số like
                    if (response.status === 'liked') {
                        // button.text('Unlike');
                        likeIcon.removeClass('far').addClass('fas');
                    } else {
                        likeIcon.removeClass('fas').addClass('far');
                        // button.text('Like');
                    }
                    likesCount.text(response.likes_count);
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
