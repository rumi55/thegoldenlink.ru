<script src="//editor.unlayer.com/embed.js"></script>

<x-forms::field-wrapper
    :id="$getId()"
    :label="$getLabel()"
    :label-sr-only="$isLabelHidden()"
    :helper-text="$getHelperText()"
    :hint="$getHint()"
    :hint-icon="$getHintIcon()"
    :required="$isRequired()"
    :state-path="$getStatePath()"
>
    <div
        wire:ignore
        x-data="{ state: $wire.entangle('{{ $getStatePath() }}') }"
        x-init="
            unlayer.init({
                id: 'editor-container',
                locale: 'ru-RU',
                displayMode: 'email',
                appearance: {
                    theme: 'light'
                },
            });

            const design = JSON.parse(JSON.stringify(state.json));

            unlayer.loadDesign(design);

            unlayer.addEventListener('design:updated', function(updates) {
              unlayer.exportHtml(function(data) {
                var json = data.design;
                var html = data.html;

                state.json = json;
                state.html = html;
              });
            });
        "
    >
        <div class="rounded-lg overflow-hidden"
            id="editor-container"
            style="height: 600px"
        ></div>
    </div>
</x-forms::field-wrapper>
