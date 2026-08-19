FantasyPros API client
======================

<!-- badges: start -->
<!-- ![GitHub release (latest by date)](https://img.shields.io/github/v/release/HansPeterOrding/fantasypros-api-client?label=development%20version) -->
<!-- badges: end -->

API Client to consume the FantasyPros public API (NFL) with a PSR-18 compatible HTTP Client and transform results into DTO.

Package contains:
* Data transfer objects (DTO)
* API client factory
* API client with endpoints

An API key is required. Request one at https://secure.fantasypros.com/api-keys/request/ — mind the request limits of your subscription; this client is deliberately rate-limit agnostic and leaves budget enforcement to the consumer (e.g. via a PSR-18 decorator).

Documentation
-------------

Documentation for FantasyProsApiClient can be found at [`Read the docs`](https://fantasypros-api-client.readthedocs.io/en/latest)

License
-------

This package is released under the MIT license. See the included [LICENSE](LICENSE) file for more information.
