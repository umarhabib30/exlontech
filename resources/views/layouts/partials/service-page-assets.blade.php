@push('styles')
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        html {
            scrollbar-width: thin;
            scrollbar-color: #9b5cf4 #0f0715;
        }

        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #b28efa;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, #9b5cf4, #6221a6);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(to bottom, #b57dff, #7a3ee9);
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endpush
