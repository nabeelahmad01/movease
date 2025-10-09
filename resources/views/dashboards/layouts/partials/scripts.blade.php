<!--begin::Javascript-->
<script>
    
</script>
<script></script>
<script></script>


<script src="{{ asset('backend_assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('backend_assets/js/scripts.bundle.js') }}"></script>
<!--end::Global Javascript Bundle-->

<!--begin::Vendors Javascript(used for this page only)-->
<script src="{{ asset('backend_assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="{{ asset('backend_assets/plugins/custom/vis-timeline/vis-timeline.bundle.js') }}"></script>

<!--begin::Custom Javascript(used for this page only)-->
<script src="{{ asset('backend_assets/js/widgets.bundle.js') }}"></script>
<script src="{{ asset('backend_assets/js/custom/widgets.js') }}"></script>
<script src="{{ asset('backend_assets/js/custom/apps/chat/chat.js') }}"></script>
<script src="{{ asset('backend_assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
<script src="{{ asset('backend_assets/js/custom/utilities/modals/create-project/type.js') }}"></script>
<script src="{{ asset('backend_assets/js/custom/utilities/modals/create-project/budget.js') }}"></script>
<script src="{{ asset('backend_assets/js/custom/utilities/modals/create-project/settings.js') }}"></script>
<script src="{{ asset('backend_assets/js/custom/utilities/modals/create-project/team.js') }}"></script>
<script src="{{ asset('backend_assets/js/custom/utilities/modals/create-project/targets.js') }}"></script>
<script src="{{ asset('backend_assets/js/custom/utilities/modals/create-project/files.js') }}"></script>
<script src="{{ asset('backend_assets/js/custom/utilities/modals/create-project/complete.js') }}"></script>
<script src="{{ asset('backend_assets/js/custom/utilities/modals/create-project/main.js') }}"></script>
<script src="{{ asset('backend_assets/js/custom/utilities/modals/create-app.js') }}"></script>
<script src="{{ asset('backend_assets/js/custom/utilities/modals/users-search.js') }}"></script>
<!--end::Custom Javascript-->
<!--end::Javascript-->

<?php
$tinymceKey = config('services.tinymce.key') ?: 'b0vm5x7pbcrlczs8fgqomnp26ddbcjye7i1f8xvfu5oepqyp';
?>
<script id="tinymce-cdn" src="https://cdn.tiny.cloud/1/{{ $tinymceKey }}/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    (function () {
        const selectors = 'textarea:not(.no-tinymce):not([data-no-editor])';

        function ready(fn) {
            if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', fn);
            else fn();
        }

        function init() {
            const hasTargets = document.querySelector(selectors);
            if (!hasTargets) return;
            if (!window.tinymce) {
                return setTimeout(init, 50);
            }
            if (tinymce.editors && tinymce.editors.length) {
                tinymce.editors.forEach(e => e.remove());
            }
            tinymce.init({
                selector: selectors,
                menubar: false,
                plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table code help wordcount',
                toolbar: 'undo redo | blocks | bold italic underline forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | link image media | table | code | help',
                height: 400,
                branding: false,
                convert_urls: false,
            });
        }

        const s = document.getElementById('tinymce-cdn');
        if (s && !window.tinymce) {
            s.addEventListener('load', () => ready(init));
        }
        ready(init);
    })();
</script>
