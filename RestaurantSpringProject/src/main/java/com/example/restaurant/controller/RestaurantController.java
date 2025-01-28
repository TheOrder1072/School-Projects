package com.example.restaurant.controller;

import com.example.restaurant.entity.*;
import com.example.restaurant.repository.*;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.*;

import java.util.List;
import java.util.Optional;

@RestController
@RequestMapping("/restaurant")
public class RestaurantController {

    @Autowired
    RestaurantRepository restRep;

    @Autowired
    CustomerRepository custRep;

    @Autowired
    ReservationRepository resRep;

    @Autowired
    RestaurantDetailsRepository restDetRep;

    // Operations for Restaurant

    @GetMapping("/restaurants")
    public List<Restaurant> getAllRestaurants() {
        return restRep.findAll();
    }

    @GetMapping("/restaurants/{restaurantId}")
    public Optional<Restaurant> getRestaurantById(@PathVariable Long restaurantId) {
        return restRep.findById(restaurantId);
    }

    @PostMapping("/restaurants")
    public String createRestaurant(@RequestBody Restaurant restaurant) {
        restRep.save(restaurant);
        return "Restaurant created successfully!";
    }

    @DeleteMapping("/restaurants/{restaurantId}")
    public String deleteRestaurant(@PathVariable Long restaurantId) {
        restRep.deleteById(restaurantId);
        return "Restaurant deleted successfully!";
    }

    // Operations for Customer

    @GetMapping("/customers")
    public List<Customer> getAllCustomers() {
        return custRep.findAll();
    }

    @GetMapping("/customers/{customerId}")
    public Optional<Customer> getCustomerById(@PathVariable Long customerId) {
        return custRep.findById(customerId);
    }

    @PostMapping("/customers")
    public String createCustomer(@RequestBody Customer customer) {
        custRep.save(customer);
        return "Customer created successfully!";
    }

    @DeleteMapping("/customers/{customerId}")
    public String deleteCustomer(@PathVariable Long customerId) {
        custRep.deleteById(customerId);
        return "Customer deleted successfully!";
    }

    // Operations for Reservation

    @GetMapping("/reservations")
    public List<Reservation> getAllReservations() {
        return resRep.findAll();
    }

    @GetMapping("/reservations/{reservationId}")
    public Optional<Reservation> getReservationById(@PathVariable Long reservationId) {
        return resRep.findById(reservationId);
    }

    @PostMapping("/restaurants/{restaurantId}/reservations")
    public String newReservation(@RequestBody Reservation reservation, @PathVariable Long restaurantId) {
        reservation.setRestaurant(restRep.findById(restaurantId).get());
        resRep.save(reservation);
        return "Reservation saved successfully!";
    }

    @DeleteMapping("/reservations/{reservationId}")
    public String deleteReservation(@PathVariable Long reservationId) {
        resRep.deleteById(reservationId);
        return "Reservation deleted successfully!";
    }

    // Operations for RestaurantDetails

    @GetMapping("/restaurantdetails")
    public List<RestaurantDetails> getAllRestaurantDetails() {
        return restDetRep.findAll();
    }

    @GetMapping("/restaurantdetails/{restaurantDetailsId}")
    public Optional<RestaurantDetails> getRestaurantDetailById(@PathVariable Long restaurantDetailsId) {
        return restDetRep.findById(restaurantDetailsId);
    }

    @PostMapping("/restaurantdetails")
    public String createRestaurantDetails(@RequestBody RestaurantDetails restaurantDetails) {
        restDetRep.save(restaurantDetails);
        return "RestaurantDetails created successfully!";
    }

    @DeleteMapping("/restaurantdetails/{restaurantDetailsId}")
    public String deleteRestaurantDetails(@PathVariable Long restaurantDetailsId) {
        restDetRep.deleteById(restaurantDetailsId);
        return "RestaurantDetails deleted successfully!";
    }


}
