<div class="flex flex-row">
  <p class="pb-3 lg:pb-7 px-2 md:px-0 m-0 text-[1rem] md:text-lg ms-0 me-auto ">
      Showing <strong>{{$cars->firstItem()}}</strong> - <strong>{{$cars->lastItem()}}</strong> out of <strong>{{ number_format($cars->total()) }}</strong> listings
  </p>
  <div class="ms-auto me-0">
    <label>Sort
      <select wire:model.live='sort' class="bg-white py-0.5 px-3 rounded-md shadow-sm border border-gray-300 ms-2">
        <option value="date-desc">Date: Newest to Oldest</option>
        <option value="date-asc">Date: Oldest to Newest</option>
        <option value="price-desc">Price - High to Low</option>
        <option value="price-asc">Price - Low to High</option>
        <option value="mileage-desc">Mileage - High to Low</option>
        <option value="mileage-asc">Mileage - Low to High</option>
        <option value="year-desc">Year - New to Old</option>
        <option value="year-asc">Year - Old to New</option>
      </select>
    </label>
  </div>
</div>