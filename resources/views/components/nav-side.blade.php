<div class="">

    {{-- Sidebar component, swap this element with another sidebar if you like --}}

{{-- Modal --}}
@include('sub-form-probate.data-entry-model')
@include('sub-form-oath.approval-model')


    @livewire('data-form.bank-form')
    @livewire('data-form.inventory-form')
    @livewire('data-form.share-form')
    @livewire('data-form.employment-form')
</div>


<!-- <nav aria-labelledby="nav-heading" x-data="{ isOpen: false }" :aria-expanded="isOpen">

  <h2 id="nav-heading">Alpine.js Accessible Navigation</h2>

  <button :aria-expanded="isOpen" aria-controls="nav-list" @click="isOpen = !isOpen">
    Alpine.js a11y Navigation
  </button>

  <ul :hidden="!isOpen" x-cloak id="nav-list">
    <li>
      <a href="https://github.com/alpinejs/alpine">Alpine.js Docs</a>
    </li>
    <li>
      <a href="https://github.com/alpinejs/awesome-alpine">Awesome Alpine.js list</a>
    </li>
    <li>
      <a href="https://alpinejs.codewithhugo.com/newsletter">Alpine.js Weekly Newsletter</a>
    </li>
  </ul>

</nav>-->