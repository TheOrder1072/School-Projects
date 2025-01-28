package com.example.movietheater.Repository;

import org.springframework.data.jpa.repository.JpaRepository;

import com.example.movietheater.Entity.Ticket;

public interface TicketRepository extends JpaRepository<Ticket, Long>{

}