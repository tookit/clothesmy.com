<?php





function add_query_params(array $params = [])
{
   $query = array_merge(
       request()->query(),
       $params
   ); // merge the existing query parameters with the ones we want to add
   return url()->current() . '?' . http_build_query($query); // rebuild the URL with the new parameters array
}
