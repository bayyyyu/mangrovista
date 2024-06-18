<footer class="footer text-center text-sm-start">
    @php
        $creationYear = 2024;
        $currentYear = date('Y');
    @endphp

    Copyright &copy; {{ $creationYear }}@if ($currentYear > $creationYear)
        - {{ $currentYear }}
    @endif Bayu Pratama


</footer>
