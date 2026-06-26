@php
    $editorId = 'editor-' . $name;
@endphp

<div class="rich-editor" data-rich-editor>
    <div class="rich-editor__toolbar" data-rich-toolbar aria-label="{{ ucwords(str_replace('_', ' ', $name)) }} toolbar">
        <button type="button" data-command="bold" title="Bold"><i class="fa-solid fa-bold"></i></button>
        <button type="button" data-command="italic" title="Italic"><i class="fa-solid fa-italic"></i></button>
        <button type="button" data-command="underline" title="Underline"><i class="fa-solid fa-underline"></i></button>
        <button type="button" data-command="insertUnorderedList" title="Bullet list"><i class="fa-solid fa-list-ul"></i></button>
        <button type="button" data-command="insertOrderedList" title="Numbered list"><i class="fa-solid fa-list-ol"></i></button>
        <button type="button" data-command="createLink" title="Link"><i class="fa-solid fa-link"></i></button>
        <button type="button" data-command="removeFormat" title="Clear formatting"><i class="fa-solid fa-eraser"></i></button>
    </div>
    <div id="{{ $editorId }}" class="rich-editor__area" contenteditable="true" data-rich-area>{!! $value !!}</div>
    <textarea name="{{ $name }}" data-rich-input style="display: none;">{{ $value }}</textarea>
</div>
