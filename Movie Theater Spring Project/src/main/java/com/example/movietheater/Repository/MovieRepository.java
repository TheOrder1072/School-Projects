package com.example.movietheater.Repository;

import org.springframework.data.jpa.repository.JpaRepository;

import com.example.movietheater.Entity.Movie;

public interface MovieRepository extends JpaRepository<Movie, Long>{

}